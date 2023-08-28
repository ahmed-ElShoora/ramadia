<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try{
            $subjects = Event::where('event',0)->count();
        $events = Event::where('event',1)->count();
        return view('home',compact('subjects','events'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }
    
    public function logOut(){
        try{
            Session::flush();
            Auth::logout();
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}
