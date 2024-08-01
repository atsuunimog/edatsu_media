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
        //add view counter
        Oppty::where('id', $id)->increment('views');
        $opp_posts = Oppty::where('id', $id)->first();

        // var_dump($opp_posts); 

        return view("opp-view",compact('opp_posts'));
    }

    //display events 
    function readEvent(Request $request, $id){
        Events::where('id', $id)->increment('views');
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
        // ->orderByRaw('ABS(DATEDIFF(deadline, CURDATE()))')
        ->orderByDesc('id')
        ->paginate(10);
        return response()->json($opp_posts);
    }

    /**display all event fields */
    function getEventFeed(){
        $ev_posts = Events::where('deleted', 0)
        // ->orderByRaw('ABS(DATEDIFF(deadline, CURDATE()))')
        ->orderByDesc('id')
        ->paginate(10);
        return response()->json($ev_posts);
    }

    //display all events
    function displayEvents(){
        return view("events");
    }


// Search facility
function searchOpportunities(Request $request)
{
    // Get the input values from the request
    $searchKeyword = $request->input('search_keyword');
    $regions = $request->input('region');
    $category = $request->input('category');
    $countries = $request->input('country');
    $continents = $request->input('continent');
    $month = $request->input('month');
    $year = $request->input('year');
    $eventStatus = $request->input('event_status');
    $datePosted = $request->input('date_posted');

    // Convert searchKeyword to lowercase (case-insensitive search)
    $searchKeyword = strtolower($searchKeyword);

    // Start building the query
    $query = Oppty::query();

    // Check if all input search parameters are empty
    $allParamsEmpty = empty($searchKeyword) && empty($regions) && empty($countries) && empty($continents)
    && empty($month) && empty($year) && empty($eventStatus) && empty($datePosted)
    && empty($category);

    // If all search parameters are empty, return the default pagination
    if ($allParamsEmpty) {
        $defaultPagination = Oppty::where('deleted', 0)
            ->orderByDesc('id')
            ->paginate(20);

        return response()->json($defaultPagination);
    }

    // Add conditions based on input values
    if ($searchKeyword) {
        $query->where(function ($query) use ($searchKeyword) {
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . $searchKeyword . '%'])
                ->orWhereRaw('LOWER(description) LIKE ?', ['%' . $searchKeyword . '%']);
        });
    }

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

    if ($category) {
        $query->where(function ($query) use ($category) {
            $categoryArray = explode(',', $category);
            foreach ($categoryArray as $cat) {
                $query->orWhere('category', 'LIKE', '%' . trim($cat) . '%');
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


    if ($eventStatus === 'on_going') {
        $query->whereDate('deadline', '>=', now());
    } elseif ($eventStatus === 'up_coming') {
        $query->whereDate('deadline', '>', now());
        // Order events by the difference between 'deadline' and current date
        $query->orderBy('deadline', 'asc');
    }

    if ($datePosted === 'one_day') {
        $query->whereDate('created_at', '>=', now()->subDay());
    } elseif ($datePosted === 'one_week') {
        $query->whereDate('created_at', '>=', now()->subWeek());
    } elseif ($datePosted === 'two_weeks') {
        $query->whereDate('created_at', '>=', now()->subWeeks(2));
    } elseif ($datePosted === 'one_month') {
        $query->whereDate('created_at', '>=', now()->subMonth());
    }

    // Execute the query and get the results
    $opp_filter = $query->where('deleted', 0)
    ->orderByDesc('id')
    ->paginate(20)->withQueryString();

    return response()->json($opp_filter);
}


/**Search Events */
function searchEvents(Request $request){
   // Get the input values from the request
   $searchKeyword = $request->input('search_keyword');
   $regions = $request->input('region');
   $event_type = $request->input('event_type');
   $category = $request->input('category');
   $countries = $request->input('country');
   $continents = $request->input('continent');
   $month = $request->input('month');
   $year = $request->input('year');
   $eventStatus = $request->input('event_status');
   $datePosted = $request->input('date_posted');

   // Convert searchKeyword to lowercase (case-insensitive search)
   $searchKeyword = strtolower($searchKeyword);

   // Start building the query
   $query = Events::query();

   // Check if all input search parameters are empty
   $allParamsEmpty = empty($searchKeyword) && empty($regions) && empty($countries) && empty($continents)
   && empty($month) && empty($year) && empty($eventStatus) && empty($datePosted) && empty($event_type)
   && empty($category);

   // If all search parameters are empty, return the default pagination
   if ($allParamsEmpty) {
       $defaultPagination = Events::where('deleted', 0)
        ->orderByDesc('id')
        ->paginate(20);

       return response()->json($defaultPagination);
   }

   // Add conditions based on input values
   if ($searchKeyword) {
       $query->where(function ($query) use ($searchKeyword) {
           $query->whereRaw('LOWER(title) LIKE ?', ['%' . $searchKeyword . '%'])
            ->orWhereRaw('LOWER(description) LIKE ?', ['%' . $searchKeyword . '%']);
       });
   }


    if ($event_type === 'in_person') {
        $query->where('event_type', 'in_person');
    } elseif ($event_type === 'virtual') {
        $query->where('event_type', 'virtual');
    } elseif ($event_type === 'hybrid') {
        $query->where('event_type', 'hybrid');
    }


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

   if ($category) {
       $query->where(function ($query) use ($category) {
           $categoryArray = explode(',', $category);
           foreach ($categoryArray as $cat) {
               $query->orWhere('category', 'LIKE', '%' . trim($cat) . '%');
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


   if ($eventStatus === 'on_going') {
       $query->whereDate('event_date', '>=', now());
   } elseif ($eventStatus === 'up_coming') {
       $query->whereDate('event_date', '>', now());
       // Order events by the difference between 'deadline' and current date
       $query->orderBy('event_date', 'asc');
   }

   if ($datePosted === 'one_day') {
       $query->whereDate('created_at', '>=', now()->subDay());
   } elseif ($datePosted === 'one_week') {
       $query->whereDate('created_at', '>=', now()->subWeek());
   } elseif ($datePosted === 'two_weeks') {
       $query->whereDate('created_at', '>=', now()->subWeeks(2));
   } elseif ($datePosted === 'one_month') {
       $query->whereDate('created_at', '>=', now()->subMonth());
   }

   // Execute the query and get the results
   $opp_filter = $query->where('deleted', 0)
   ->orderByDesc('id')
   ->paginate(20)->withQueryString();

   return response()->json($opp_filter);
}


}
