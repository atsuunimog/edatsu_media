<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

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

            $opportunities = Bookmark::with('opportunity')
            ->where('user_id', $user_id)
            ->where('deleted', 0)
            ->where('opportunity_id', '<>', null)
            ->orderBy('id', 'desc')->paginate('5');
  
            return response()->json(['data_feeds' => $opportunities]);
        }


        /**list all bookmarked events */
        public function listBookmarkedEvents(Request $request) {
            $user_id = Auth::user()->id;

            $events = Bookmark::with('event')
            ->where('user_id', $user_id)
            ->where('deleted', 0)
            ->where('event_id', '<>', null)
            ->orderBy('id', 'desc')->paginate('5');

            return response()->json(['data_feeds' => $events]);
        }

        /**
         * list all bookmarks
         */

        public function fetchAllBookmark(){
            $user_id = Auth::user()->id;

            /**ELOQUENT DB QUERY**/
            $bookmarks = Bookmark::with('opportunity', 'event')
            ->where('user_id', $user_id)
            ->where('deleted', 0)
            ->orderBy('id', 'desc')->paginate('5');

            // Fetch bookmarked opportunities
            // $opportunities = DB::table('bookmarks')
            // ->join('opportunities', 'bookmarks.opportunity_id', '=', 'opportunities.id')
            // ->select('bookmarks.id AS bookmark_id', 'bookmarks.*', 'opportunities.*')
            // ->where('bookmarks.deleted', 0)
            // ->where('user_id', $user_id)
            // ->orderBy('bookmarks.id', 'desc')
            // ->get();

            // Fetch bookmarked events
            // $events = DB::table('bookmarks')
            // ->join('events', 'bookmarks.event_id', '=', 'events.id')
            // ->select('bookmarks.id AS event_id', 'bookmarks.*', 'events.*')
            // ->where('bookmarks.deleted', 0)
            // ->where('user_id', $user_id)
            // ->orderBy('bookmarks.id', 'desc')
            // ->get();

            // Merge the opportunities and events into a single collection
            // $allBookmarks = $opportunities->merge($events);

            // // Paginate the combined collection
            // $bookmarks = new LengthAwarePaginator(
            //     $allBookmarks->forPage(request()->page, 5),
            //     $allBookmarks->count(),
            //     5,
            //     request()->page,
            //     ['path' => request()->url()]
            // );

            return response()->json(['data_feeds' => $bookmarks]);
        }

        /**remove bookmark */
        public function removeBookmark(Request $request){
            $id = $request->post('id'); 
            $user_id = Auth::user()->id;
            $delete_bookmark = Bookmark::where('id', $id)
            ->where('user_id', $user_id)->update(['deleted' => 1]);
            if($delete_bookmark > 0){
                return response()->json(['status' => 'success', 'message' => 'Bookmark Removed']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Oops! Something went wrong']);
            }
        }

}
