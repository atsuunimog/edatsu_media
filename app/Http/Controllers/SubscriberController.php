<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            // return response()->json(['data'=> $request->post('url')]);
            if(Auth::check()){
                //bookmark url
                return response()->json(['success' => true, 'message'=> 'Bookmark Successful']);
            }else{
                //request user to sign up
                return response()->json(['success' => false, 'message'=> 'Login to bookmark']);
            }
        }
}
