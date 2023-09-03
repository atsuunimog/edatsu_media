<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\Oppty;

class Dashboard extends Controller
{
    //redirect logged user...
    function accessControl(Request $request){
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                //display total number of events and opp posted
                $total_oppty = Oppty::all();
                $total_events = Events::all();
                return view('admin.dashboard', 
                    [
                    'total_events'=> count($total_events),
                    'total_oppty' => count($total_oppty)
                    ]
                );
            }elseif(Auth::user()->role == 'subscriber'){
                return view('subscriber.dashboard');
            }
        }else{
            //terminate existing session an redirect user to home page
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    }

}


