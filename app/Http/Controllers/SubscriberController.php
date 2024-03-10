<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
        //
        function index(){
            return view('subscriber.dashboard');
        }

        function bookmark(){
            return view('subscriber.bookmark');
        }

        //bookmarking
        public function bookmarkFeed(Request $request){
            //check if user is authenticated if not 
            // return response()->json(['data' => $request->all()]);
            if(Auth::check()){

                //validate entries 
                $validator = Validator::make($request->all(), [
                    "url" => "required", 
                    "title" => "required",
                ]);

                //handle validation errors
                if($validator->fails()){
                    return response()->json(['message'=> $validator->errors()]);
                }

                //init database 
                $feedsBookmark = new BookmarkFeeds;
                $feedsBookmark->user_id = Auth::user()->id;
                $feedsBookmark->title = $request->post('title');
                $feedsBookmark->external_url = $request->post('url');
                $feedsBookmark->save();

                return response()->json(['success' => true, 'message'=> 'Bookmark Successful']);
            }else{
                //request user to sign up
                return response()->json(['success' => false, 'message'=> 'Login to bookmark']);
            }
        }

        /**list bookmark */
        public function listBookmark(Request $request) {
            // $perPage = $request->query('perPage', 5); // Number of items per page, default is 5
            $bookmark_feeds = Bookmark::where('post_type', 'oppo-type')
            ->where('general_bookmarks.deleted', '<>', 1)
            ->leftJoin('opportunity', 'general_bookmarks.post_id', '=', 'opportunity.id')
            ->orderBy('general_bookmarks.id', 'desc')
            ->paginate(5);

        
            return response()->json(['data_feeds' => $bookmark_feeds]);
        }

    /**remove bookmark */
    public function removeBookmark(Request $request){
        $id = $request->post('id'); 
        $user_id = Auth::user()->id;
        $delete_bookmark = Bookmark::where('post_id', $id)
        ->where('user_id', $user_id)->update(['deleted' => 1]);
        if($delete_bookmark > 0){
            return response()->json(['status' => 'success', 'message' => 'Bookmark Removed']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Oops! Something went wrong']);
        }
    }

   
}
