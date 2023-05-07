<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oppty;
use Illuminate\Support\Carbon;


class Opportunity extends Controller
{
    //
    function show(){
        $opp_posts = Oppty::where('deleted', 0)->orderByDesc('id')->paginate(10);
        return view("admin.opportunity_page", ["opp_posts" => $opp_posts]);
    }

    function edit(Request $request, $id){
        $opp_posts = Oppty::where('deleted', 0)->orderByDesc('id')->paginate(10);
        $edits = Oppty::select('*')->where('id', '=', $id)->where('u_id', '=', $request->user()->id)->get();
        return view("admin.opportunity_page", ["opp_posts" => $opp_posts, "edits"=> $edits]);
    }

    function store(Request $request){
        //capture values 
        $title = $request->title;
        $description = $request->description;
        $reference = $request->reference;
        $region = $request->region;
        $country = $request->country;
        $continent = $request->continent;  
        $deadline = $request->deadline;

        //validate the data 
        $request->validate([
            'title' => ['required', 'max:191'],
            'description'=> ['required'],
            'reference'=> ['required', 'url', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', 'active_url'],
        ]);

        //prevent users from backdating job post
        $current_date = Carbon::now();  
        $deadline = Carbon::parse($request->deadline);

        if (!$deadline->greaterThanOrEqualTo($current_date)) {
        return back()->withErrors(["error_msg"=>"Invalid date"])->withInput($request->input());
        }

        //store the data in the data base
        Oppty::create([
            'u_id' => $request->user()->id,
            'user_role' => $request->user()->role,
            'title' => $title,
            'description'=> $description,
            'deadline'=> $request->deadline,
            'source_url' => $reference,
            'region'=> $region,
            'country'=> $country,
            'continent'=> $continent
        ]);

        return redirect('admin-post-opportunity')->with('status', 'Post Successful!');
    }

    /**update database */
    function update(Request $request, $id){
        //capture values 
        $title = $request->title;
        $description = $request->description;
        $reference = $request->reference;
        $region = $request->region;
        $country = $request->country;  
        $continent = $request->continent;
        $deadline = $request->deadline;

        //validate the data 
        $request->validate([
            'title' => ['required', 'max:191'],
            'description'=> ['required'],
            'reference'=> ['required', 'url', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', 'active_url'],
        ]);



        if(isset($request->deadline)){
            $current_date = date('D/M/Y');
            $deadline = date('D/M/Y', strtotime($request->deadline));
            // dd(($current_date > $deadline));
            if($current_date > $deadline){
                return back()->withErrors(["error_msg"=>"Invalid date"])->withInput($request->input());
            };
        };

        //store the data in the data base
        Oppty::where('id', $id)
        ->where('u_id', $request->user()->id)
        ->update
        ([
            'u_id' => $request->user()->id,
            'user_role' => $request->user()->role,
            'title' => $title,
            'description'=> $description,
            'deadline' => $request->deadline,
            'source_url' => $reference,
            'region'=> $region,
            'country'=> $country,
            'continent'=> $continent
        ]);

        return redirect('admin-post-opportunity')->with('status', 'Post Updated!');
    }

    /**delete database */
    function delete(Request $request, $id){
        Oppty::where('id', $id)
        ->where('u_id', $request->user()->id)
        ->update
        ([
            'deleted' => 1
        ]);

        return redirect('admin-post-opportunity')->with('status', 'Post Deleted!');
    }








}
