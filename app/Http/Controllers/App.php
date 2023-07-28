<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Oppty;
use Carbon\Carbon;

class App extends Controller
{
    //display  opp content
    function readOpportunity(Request $request, $id){
        $opp_posts = Oppty::where('id', $id)->first();
        return view("opp-view", ["opp_posts" => $opp_posts]);
    }

    //display events 
    function readEvent(Request $request, $id){
        $ev_posts = Events::where('id', $id)->first();
        return view("ev-view", ["ev_posts" => $ev_posts]);
    }

    //display all opportunites
    function displayOpp(Request $request){
        return view("welcome");
    }

      //display all opportunites
      function getOppFeed(Request $request){
        $opp_posts = Oppty::where('deleted', 0)
        ->orderByRaw('ABS(DATEDIFF(deadline, CURDATE()))')
        ->orderByDesc('id')
        ->paginate(10);
        return response()->json($opp_posts);
    }

    //display all events
    function displayEvents(){
        $ev_posts = Events::where('deleted', 0)->orderByDesc('id')->paginate(10);
        return view("events", ["ev_posts" => $ev_posts]);
    }


// Search facility
function searchOpportunities(Request $request)
{
    // Get the input values from the request
    $searchKeyword = $request->input('search_keyword');
    $oppStatus = $request->input('opp_status');
    $regions = $request->input('region');
    $countries = $request->input('country');
    $continents = $request->input('continent');
    $month = $request->input('month');
    $year = $request->input('year');

    // Convert searchKeyword to lowercase (case-insensitive search)
    $searchKeyword = strtolower($searchKeyword);

    // Start building the query
    $query = Oppty::query();

    // Add conditions based on input values
    if ($searchKeyword) {
        $query->where(function ($query) use ($searchKeyword) {
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . $searchKeyword . '%'])
                ->orWhereRaw('LOWER(description) LIKE ?', ['%' . $searchKeyword . '%'])
                // Add more fields as needed
                // ->orWhereRaw('LOWER(field3) LIKE ?', ['%' . $searchKeyword . '%'])
                // ...
                ;
        });
    }

    // if ($oppStatus === 'active') {
    //     $today = Carbon::today();
    //     $query->where('deadline', '>', $today);
    // } elseif ($oppStatus) {
    //     $query->where('opp_status', $oppStatus);
    // }

    if ($regions) {
        $query->where(function ($query) use ($regions) {
            $regionsArray = explode(',', $regions);
            foreach ($regionsArray as $region) {
                $query->orWhere('region', 'LIKE', '%' . trim($region) . '%');
            }
        });
    }

    if ($countries) {
        $query->where(function ($query) use ($countries) {
            $countriesArray = explode(',', $countries);
            foreach ($countriesArray as $country) {
                $query->orWhere('country', 'LIKE', '%' . trim($country) . '%');
            }
        });
    }

    if ($continents) {
        $query->where(function ($query) use ($continents) {
            $continentsArray = explode(',', $continents);
            foreach ($continentsArray as $continent) {
                $query->orWhere('continent', 'LIKE', '%' . trim($continent) . '%');
            }
        });
    }

    if ($month) {
        $monthNumber = Carbon::parse($month)->month;
        $query->whereMonth('created_at', $monthNumber);
    }

    if ($year) {
        $query->whereYear('created_at', $year);
    }

    // Execute the query and get the results
    $opp_filter = $query->where('deleted', 0)
        ->orderByRaw('ABS(DATEDIFF(deadline, CURDATE()))')
        ->orderByDesc('id')
        ->paginate(10);

    return response()->json($opp_filter);
}




}
