<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Throwable;
class ContactController extends Controller
{
    public function index(){
        try {
            $data = Setting::where('var','contact_image')->first()->value;
            return response()->json([
                'status'=>true,
                'msg'=>'',
                'data'=>asset('/'.$data)
            ]);
        }catch (Throwable $e){
            return response()->json([
                'status'=>false,
                'msg'=>'',
                'error-code'=>7001
            ]);
        }
    }

    public function store(Request $request){
        try {
            Contact::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'note'=>$request->note
            ]);
            return response()->json([
                'status'=>true,
                'msg'=>'',
                'data'=>''
            ]);
        }catch (Throwable $e){
            return response()->json([
                'status'=>false,
                'msg'=>'',
                'error-code'=>7001
            ]);
        }
    }
}
