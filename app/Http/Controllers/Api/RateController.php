<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use Throwable;

class RateController extends Controller
{
    public function index(Request $request){
        try{
            Rate::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'event_name'=>$request->event_name,
                'type_ticket'=>$request->type_ticket,
                'note'=>$request->note,
                'ticket_price'=>$request->ticket_price,
                'organize_event'=>$request->organize_event,
                'locate_event'=>$request->locate_event,
                'Types_para'=>$request->Types_para,
                'food'=>$request->food,
                'organizer_helper'=>$request->organizer_helper,
                'rate'=>$request->rate,
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
