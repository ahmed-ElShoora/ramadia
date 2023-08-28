<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WebController extends Controller
{
    public function index(){
        View::create([
            'ip'=>'127.0.0.1'
        ]);
        return view('front.index');
    }

    public function privacy(){
        $data_ar = Setting::where('var','privacy_ar')->first()->value;
        $data_en = Setting::where('var','privacy_en')->first()->value;
        return view('front.privacy',compact('data_ar','data_en'));
    }

    public function contact(){
        return view('front.contact');
    }

    public function rateEvent(){
        return view('front.event');
    }

    public function rateSubject(){
        return view('front.subject');
    }

    public function ticket($id,$id2){
        if($id == $id2){
            if(Payment::find($id)){
                $data = Payment::where('id',$id)->first();
                $data_event = Event::select(
                    'title_ar',
                    'title_en',
                    'locate'
                )->where('id',$data->event_id)->first();
                return view('front.ticket',compact('data','data_event'));
            }else{
                return view('error.error');
            }
        }else{
            return view('error.error');
        }
    }
}
