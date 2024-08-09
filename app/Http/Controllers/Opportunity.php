<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oppty;
use Illuminate\Support\Carbon;
use Validator;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;


class Opportunity extends Controller
{
    //...
    function show(){
        $opp_posts = Oppty::where('deleted', 0)->orderByDesc('id')->limit(5)->get();
        return view("admin.opportunity_page", ["opp_posts" => $opp_posts]);
    }

    function edit(Request $request, $id){
        $opp_posts = Oppty::where('deleted', 0)->orderByDesc('id')->paginate(10);
        $edits = Oppty::select('*')->where('id', '=', $id)->where('u_id', '=', $request->user()->id)->get();
        return view("admin.opportunity_page", ["opp_posts" => $opp_posts, "edits"=> $edits]);
    }

    function createSlug($title) {
        // Convert to lowercase
        $slug = strtolower($title);
        
        // Replace non-alphanumeric characters with hyphens
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        
        // Remove consecutive hyphens
        $slug = preg_replace('/-+/', '-', $slug);
        
        // Trim hyphens from the beginning and end
        $slug = trim($slug, '-');
        
        return $slug;
    }

    function store(Request $request, $id=''){
        //validate the data...
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'reference' => 'required|url|max:255',
            'regions' => 'nullable|string',
            'country' => 'nullable|string',
            'continent' => 'nullable|string',
            'deadline' => 'nullable|date', // Adjust this rule based on your date format
            'category' => 'nullable|string',
            'meta_description' => 'nullable|string', 
            'meta_keywords' => 'nullable|string',
            'post_type' => 'nullable|string'
        ]);

        $op = ($id)? Oppty::find($id) : new Oppty();

        /**
         * check if request has file 
         */
        if($request->hasFile('cover_img')){
            if($request->file('cover_img')->isValid()){
                $file = $request->file('cover_img');
                $originalFileName = $file->getClientOriginalName();
                $file->storeAs('public/uploads/channels', $originalFileName);
                $op->cover_img = $originalFileName;
            }
        }
        
        //capture values 
        $title = $request->title;
        $slug  = $this->createSlug($title);
        $description = $request->description;
        $reference = $request->reference;
        $region = $request->region;
        $country = $request->country;
        $continent = $request->continent;  
        $deadline = $request->deadline;
        $category = $request->category;
        $direct_link = $request->direct_link;
        $meta_description = $request->meta_description;
        $meta_keywords = $request->meta_keywords;
        $post_type = $request->post_type;

        //prevent users from backdating job post
        $current_date = Carbon::now();  
        $deadline = Carbon::parse($request->deadline);

        if (!$deadline->greaterThanOrEqualTo($current_date)) {
        return back()->withErrors(["error_msg"=>"Invalid date"])->withInput($request->input());
        }

        //store the data in the data base
        $op->u_id = $request->user()->id;
        $op->user_role = $request->user()->role;
        $op->title = $title;
        $op->slug  = $slug;
        $op->description = $description;
        $op->deadline = $request->deadline;
        $op->source_url = $reference;
        $op->direct_link = $direct_link;
        $op->category = $category;
        $op->region = $region;
        $op->country = $country;
        $op->continent = $continent;
        $op->meta_description = $meta_description;
        $op->meta_keywords = $meta_keywords;
        $op->post_type = $post_type;

        $op->save();

        return redirect('admin-post-opportunity')->with('status', 'Post Successful!');
    }

    /**update database */
    // function update(Request $request, $id){
    //     //capture values 
    //     $title = $request->title;
    //     $description = $request->description;
    //     $reference = $request->reference;
    //     $category = $request->category;
    //     $region = $request->region;
    //     $country = $request->country;  
    //     $continent = $request->continent;
    //     $deadline = $request->deadline;

    //     //validate the data 
    //     $request->validate([
    //         'title' => ['required', 'max:191'],
    //         'description'=> ['required'],
    //         'reference'=> ['required', 'url', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', 'active_url'],
    //     ]);

    //     //prevent users from backdating job post
    //     $current_date = Carbon::now();  
    //     $deadline = Carbon::parse($request->deadline);

    //     if (!$deadline->greaterThanOrEqualTo($current_date)) {
    //     return back()->withErrors(["error_msg"=>"Invalid date"])->withInput($request->input());
    //     }

    //     //store the data in the data base
    //     Oppty::where('id', $id)
    //     ->where('u_id', $request->user()->id)
    //     ->update
    //     ([
    //         'u_id' => $request->user()->id,
    //         'user_role' => $request->user()->role,
    //         'title' => $title,
    //         'description'=> $description,
    //         'deadline' => $request->deadline,
    //         'source_url' => $reference,
    //         'category' => $category,
    //         'region'=> $region,
    //         'country'=> $country,
    //         'continent'=> $continent
    //     ]);

    //     return redirect('admin-post-opportunity')->with('status', 'Post Updated!');
    // }

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

    /***
     * bookmark opportunity
     */

    public function bookmarkOpportunity(Request $request){

        if(Auth::check()){

            $opp_id = $request->post('id'); 
            $user_id = $request->user()->id;
            
            //validate entries 
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer', 
                "type" => "required",
            ]);

            //handle validation errors
            if($validator->fails()){
                return response()->json(
                    ['status' => 'error', 'message'=> 'Oops! Something went wrong']
                );
            }

            //init bookmark
            $bookmark = new Bookmark;

            //check if post_id already exist in database. 
            if($bookmark->where('opportunity_id', $opp_id)
            ->where('user_id', $user_id)
            ->exists()){
                //check if its removed, if removed, update deleted to 0 to add it back
                $is_deleted = $bookmark->where('opportunity_id', $opp_id)
                ->where('user_id', $user_id)
                ->where('deleted', 1);

                if($is_deleted->count() > 0){
                    //update record
                    $restore_bookmark = $bookmark->where('opportunity_id', $opp_id)
                    ->where('user_id', $user_id)
                    ->update(['deleted' => 0]);

                    if($restore_bookmark > 0){
                        return response()->json(['status' => 'success', 'message' => "Bookmarked"]);
                    }
                }
                return response()->json(['status' => 'error', 'message'=> 'Already Bookmarked']);
            }

            //save data...
            $bookmark->user_id = $user_id;
            $bookmark->opportunity_id = $opp_id;
            $bookmark->save();

            return response()->json(['status' => 'success', 'message' => "Bookmarked"]);

        }else{

            return response()->json(['status' => 'warning', 'message' => "Login to Bookmark"]);
        }
     }


     /**
      * display all opportunities 
      */
    public function fetchAllOpportunities()
    {
        $allOppty = Oppty::orderBy('id', 'desc')
            ->get()
            ->map(function($oppty) {
                $current_date = Carbon::now();
                $status = ($current_date > $oppty->deadline) ? 'Expired' : 'Active';
                
                return [
                    'id' => $oppty->id,
                    'title' => $oppty->title,
                    'views' => $oppty->views,
                    'created_at' => $oppty->created_at->format('Y-m-d'),
                    'deadline' => $oppty->deadline,
                    'status' => $status,
                    // Add any other fields you need
                ];
            });
    
        return response()->json(['data' => $allOppty]);
    }


    public function showOpportunities(){
      
        return view('admin.allOppty'); 
    }


}
