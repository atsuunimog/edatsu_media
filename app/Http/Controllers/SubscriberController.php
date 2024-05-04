<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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

        /**list all bookmarked opportunities */
        public function listBookmarkedOpportunites(Request $request) {
            $user_id = Auth::user()->id;
            $bookmark_feeds = Bookmark::where('general_bookmarks.deleted', '<>', 1)
            ->where("general_bookmarks.user_id", $user_id)
            ->leftJoin('opportunity', 'general_bookmarks.post_id', 'opportunity.id')
            ->where("post_type", "oppo-type")
            ->orderBy('general_bookmarks.id', 'desc')
            ->paginate(5);
        
            return response()->json(['data_feeds' => $bookmark_feeds]);
        }


        /**list all bookmarked events */
        public function listBookmarkedEvents(Request $request) {
            $user_id = Auth::user()->id;
            $bookmark_feeds = Bookmark::where('general_bookmarks.deleted', '<>', 1)
            ->where("general_bookmarks.user_id", $user_id)
            ->leftJoin('events', 'general_bookmarks.post_id', 'events.id')
            ->where("post_type", "event-type")
            ->orderBy('general_bookmarks.id', 'desc')
            ->paginate(5);
        
            return response()->json(['data_feeds' => $bookmark_feeds]);
        }

        /**
         * list all bookmarks
         */

        public function fetchAllBookmark(){
            
            $user_id = Auth::user()->id;
            
            $bookmark_feeds = Bookmark::where('general_bookmarks.deleted', '<>', 1)
            ->where("user_id", $user_id)
            ->leftJoin('events', 'events.id', 'general_bookmarks.post_id')
            ->leftJoin('opportunity', 'opportunity.id', 'general_bookmarks.post_id')
            ->where(function($query) {
                $query->where('post_type', 'oppo-type')->orWhere('post_type', 'event-type');
            })
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
