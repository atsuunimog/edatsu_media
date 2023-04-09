<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class Event extends Controller
{

//
function show(){
    $ev_posts = Events::where('deleted', 0)->orderByDesc('id')->paginate(2);
    return view("admin.event_page", ["ev_posts" => $ev_posts]);
}

function edit(Request $request, $id){
    $ev_posts = Events::where('deleted', 0)->orderByDesc('id')->paginate(2);
    $edits = Events::select('*')->where('id', '=', $id)->where('u_id', '=', $request->user()->id)->get();
    return view("admin.event_page", ["ev_posts" => $ev_posts, "edits"=> $edits]);
}

function store(Request $request){

    //capture values 
    $title = $request->title;
    $description = $request->description;
    $location = $request->location;
    $event_date = $request->event_date;
    $reference = $request->reference;
    $region = $request->region;
    $country = $request->country;  

    //validate the data 
    $request->validate([
        'title' => ['required', 'max:191'],
        'description'=> ['required'],
        'location' => ['required'],
        'event_date' => ['required'],
        'reference'=> ['required', 'url', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', 'active_url'],
        'region'=> ['required', 'max:191'],
        'country'=> ['required', 'max:191'],
    ]);


    $current_date = date('d/m/y');
    $event_date = date('d/m/y', strtotime($request->event_date));
    if($current_date >= $event_date){
        return back()->withErrors(["error_msg"=>"Invalid event date"])->withInput($request->input());
    }

    //store the data in the data base
    Events::create([
        'u_id' => $request->user()->id,
        'user_role' => $request->user()->role,
        'title' => $title,
        'description'=> $description,
        'location' => $location,
        'event_date' => $event_date,
        'source_url' => $reference,
        'region'=> $region,
        'country'=> $country
    ]);

    return redirect('admin-post-event')->with('status', 'Post Successful!');
}

/**update database */
function update(Request $request, $id){
        //capture values 
        $title = $request->title;
        $description = $request->description;
        $location = $request->location;
        $event_date = $request->event_date;
        $reference = $request->reference;
        $region = $request->region;
        $country = $request->country;  
    
        //validate the data 
        $request->validate([
            'title' => ['required', 'max:191'],
            'description'=> ['required'],
            'location' => ['required'],
            'event_date' => ['required'],
            'reference'=> ['required', 'url', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', 'active_url'],
            'region'=> ['required', 'max:191'],
            'country'=> ['required', 'max:191'],
        ]);

    //store the data in the data base
    Events::where('id', $id)
    ->where('u_id', $request->user()->id)
    ->update
    ([
        'u_id' => $request->user()->id,
        'user_role' => $request->user()->role,
        'title' => $title,
        'description'=> $description,
        'location'=> $location,
        'event_date'=> $event_date,
        'source_url' => $reference,
        'region'=> $region,
        'country'=> $country
    ]);

    return redirect('admin-post-event')->with('status', 'Post Updated!');
}

/**delete database */
function delete(Request $request, $id){
    Events::where('id', $id)
    ->where('u_id', $request->user()->id)
    ->update
    ([
        'deleted' => 1
    ]);

    return redirect('admin-post-event')->with('status', 'Post Deleted!');
}



}
