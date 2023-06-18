<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Psr7\Uri;
use Exception;
use Illuminate\Support\Facades\URL;




class FeedsController extends Controller
{

    
    public function displayFeeds(Request $request)
    {
        $feeds = [];
    
        // https://www.opportunitiesforafricans.com/feed/
    
        if ($request->has("feeder") && $request->feeder !== null) {
            $url = $request->input("feeder");
            $feeds[] = $url;
            Cache::forget('feeds_data'); // Clear the cached data
        } else {
            $feeds = [
                "https://disrupt-africa.com/feed/",
                "https://techpoint.africa/feed/",
                "https://techcabal.com/feed/",
                "https://technext24.com/feed/",
            ];
        }
    
        $cacheKey = 'feeds_data';
        $data = Cache::get($cacheKey);
    
        if (!$data) {
            $data = [];
            $promises = [];
            $client = new Client([
                'verify' => false, // Disable SSL verification
                RequestOptions::HTTP_ERRORS => false, // Prevent throwing exceptions on HTTP errors
                RequestOptions::ALLOW_REDIRECTS => true, // Allow following redirects
                RequestOptions::SINK => null, // Disable saving response to a file
            ]);
    
            foreach ($feeds as $url) {
                $promises[] = $client->getAsync($url);
            }
    
            $responses = Promise\unwrap($promises);
    
            foreach ($responses as $response) {
                if ($response->getStatusCode() !== 200) {
                    continue;
                }
    
                try {
                    $xml = simplexml_load_string($response->getBody());
                    if ($xml === false) {
                        // Handle invalid XML
                        continue;
                    }

                    $feedUrl = $response->getHeaderLine('X-Guzzle-Redirect-History');
                    $parsedUrl = parse_url($feedUrl);
                    $domainName = $parsedUrl['host'] ?? '';
            
                    if (empty($domainName)) {
                        $request = $response->getHeaderLine('X-Guzzle-Redirect-Request');
                        $feedUrl = $request ? (string) $request->getUri() : '';
                        $domainName = (new Uri($feedUrl))->getHost();
                    }

                    foreach ($xml->channel->item as $item) {
                        $pubDate = strtotime((string) $item->pubDate);
                        $today = strtotime('today');
    
                        if ($pubDate < $today) {
                            continue;
                        }
    
                        $title = (string) $item->title;
                        $description = (string) $item->description;
                        $link = (string) $item->link;
                        $date = date('jS M, Y', $pubDate);
    
                        $description = strlen($description) >= 200 ? substr($description, 0, 200) . "..." : $description;
    
                        $data[] = [
                            'title' => $title,
                            'description' => $description,
                            'link' => $link,
                            'date' => $date,
                            'domain_name' => $domainName
                        ];
                    }
                } catch (Exception $e) {
                    // Handle any exceptions that occur during parsing
                    continue;
                }
            }
    
            if (count($data) > 0) {
                shuffle($data);
                Cache::put($cacheKey, $data, 60); // Cache the data for 60 minutes
            } else {
                $data[] = [
                    'title' => 'Oops! No post yet',
                    'description' => 'Please check back later',
                    'link' => '',
                    'date' => '',
                    'domain_name' => ''
                ];
            }
        }
    
        return view('feeds')->with('data', $data)->render();
    }
    
    
    
    
    
    
    
    

    

    //feeds
    public function getCurrentFeeds(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        
        $currentPage = $request->input('page', 1);

        $startIndex = ($currentPage - 1) * $perPage;

        $currentDate = new DateTime();

        $feedUrls = $request->input('feed_urls', []);

        $currentFeeds = [];

        foreach ($feedUrls as $url) {
            
            try {
                $client = new Client();
                $response = $client->get($url);

                if ($response->getStatusCode() == 200) {
                    $xmlContent = $response->getBody()->getContents();
                    $xml = simplexml_load_string($xmlContent);

                    // Handle different XML structures
                    if (isset($xml->channel) && isset($xml->channel->item)) {
                        // Standard XML structure
                        $items = $xml->channel->item;
                    } elseif (isset($xml->entry)) {
                        // Different XML structure with "entry" instead of "item"
                        $items = $xml->entry;
                    } else {
                        // Unknown XML structure, log a warning and continue to the next URL
                        Log::warning("Unknown XML structure for feed from URL: {$url}");
                        continue;
                    }
                
                    foreach ($items as $item) {
                        $feedTitle = (string) $item->title;
                        $feedDate = new DateTime($item->pubDate);
                        $feedLink = (string) $item->link;
                        $feedContent = (string) $item->description;

                        // Check if the feed date matches the current date
                        if ($feedDate->format('Y-m-d') == $currentDate->format('Y-m-d')) {
                            $truncatedContent = Str::words($feedContent, 200, '...');

                            $currentFeeds[] = [
                                'title' => $feedTitle,
                                'date' => $feedDate->format('Y-m-d'),
                                'url' => $feedLink,
                                'content' => $truncatedContent,
                            ];
                        }
                    }
                }
            } catch (\Exception $e) {
                // Handle the exception as per your needs
                // You can log the error or return an error response
                
                error_log("Error occurred while fetching feeds from {$url}: " . $e->getMessage());
            }
        }

        $totalFeeds = count($currentFeeds);
        $paginatedFeeds = array_slice($currentFeeds, $startIndex, $perPage);

        $paginationData = [
            'total' => $totalFeeds,
            'per_page' => $perPage,
            'current_page' => $currentPage,
            'last_page' => ceil($totalFeeds / $perPage),
            'data' => $paginatedFeeds,
        ];

        //return response()->json($paginationData);

        return view('feeds', ['data' => $paginationData]);
    }
}