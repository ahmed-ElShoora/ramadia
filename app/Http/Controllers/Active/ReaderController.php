<?php

namespace App\Http\Controllers\Active;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReaderController extends Controller
{
    public function index(){
        try{
            $name = Event::select('title_ar')->where('id',Auth()->user()->event_id)->first()->title_ar;
            return view('active.index',compact('name'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function moveStatusMany(Request $request){
        try{
            $data = Payment::where('id',$request->id)->where('payment_status',1)->first();
            if($request->person != 0){
                Payment::find($request->id)->update([
                    'num_person_del'=>$data->num_person_del-$request->person
                ]);
            }
            if($request->baby != 0){
                Payment::find($request->id)->update([
                    'baby_num_del'=>$data->baby_num_del-$request->baby
                ]);
            }
            $data_new = Payment::where('id',$request->id)->first();
            if($data_new->num_person_del == 0){
                if($data_new->baby_num_del == 0){
                    Payment::find($request->id)->update([
                        'status'=>true
                    ]);
                }
            }
            return redirect()->back();
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

    public function allPer(){
        try{
            $datas = Payment::where('event_id',Auth()->user()->event_id)->where('payment_status',1)->paginate(env("paginate_num"));
            return view('active.all',compact('datas'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function showData($id){
        $num = Payment::where('id',$id)->where('payment_status',1)->where('event_id',Auth()->user()->event_id)->count();
        if($num == 0){
            $status = false;
            return view('active.show',compact('status'));
        }else{
            $status = true;
            $data = Payment::where('id',$id)->first();
            return view('active.show',compact('status','data'));
        }
    }

    public function moveStatus($id){
        try{
            Payment::find($id)->update([
                'status'=>true
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}
