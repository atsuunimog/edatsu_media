<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Oppty;

class App extends Controller
{
    //display all opportunites
    function displayOpp(){
        $opp_posts = Oppty::where('deleted', 0)->orderByDesc('id')->paginate(10);
        return view("welcome", ["opp_posts" => $opp_posts]);
    }

    //display all events
    function displayEvents(){
        $ev_posts = Events::where('deleted', 0)->orderByDesc('id')->paginate(10);
        return view("events", ["ev_posts" => $ev_posts]);
    }
}
