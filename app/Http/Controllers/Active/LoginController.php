<?php

namespace App\Http\Controllers\Active;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

class LoginController extends Controller
{
    public function index(){
        try{
            return view('auth.active-login');
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function store(Request $request){
        try{
            if(auth()->guard('active')->attempt(['email' => $request->email,'password' => $request->password])){
                return redirect()->route('active.home');
            }
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}
