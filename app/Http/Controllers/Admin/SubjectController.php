<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Throwable;
use App\Http\Traits\UplodeTrait;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Active;

class SubjectController extends Controller
{
    use UplodeTrait;
    public function index(){
        try {
            $events = Event::select(
                'id','title_ar','start_date','end_date'
            )->where('event',false)->latest()->paginate(env("paginate_num"));
            return view('admin.subject.index',compact('events'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function filter(Request $request){
        try {
            $events = Event::select(
                'id','title_ar','start_date','end_date'
            )->where('event',false)->where('title_ar', 'like',$request->name)->latest()->paginate(env("paginate_num"));
            return view('admin.subject.index',compact('events'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function create(){
        try {
            return view('admin.subject.create');
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function store(Request $request){
        try {
            $image = $this->uploud($request->image);
            if($request->type_send == 'phone'){
                $phone = true;
                $email = false;
            }elseif($request->type_send == 'email'){
                $phone = false;
                $email = true;
            }else{
                $phone = true;
                $email = true;
            }
            if($request->send_with_buy == 'true'){
                $send_with_buy = true;
            }else{
                $send_with_buy = false;
            }
            if($request->send_locate_with_buy == 'true'){
                $send_locate_with_buy = true;
            }else{
                $send_locate_with_buy = false;
            }
            $event = Event::create([
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'desc_en'=>$request->desc_en,
                'desc_ar'=>$request->desc_ar,
                'color_background'=>$request->color_background,
                'color_button'=>$request->color_button,
                'master_image'=>$image,
                'show_date'=>$request->show_date,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'email_send'=>$email,
                'phone_send'=>$phone,
                'send_with_buy'=>$send_with_buy,
                'event'=>false, // true = is event , != is subject
                'price_normal'=>null,
                'price_vip'=>null,
                'price_a'=>$request->price_a,
                'price_b'=>$request->price_b,
                'price_c'=>$request->price_c,
                'chair_normal'=>null,
                'chair_vip'=>null,
                'chair_a'=>$request->chair_a,
                'chair_b'=>$request->chair_b,
                'chair_c'=>$request->chair_c,
                'resend_date'=>$request->resend_date,
                'locate'=>$request->locate,
                'send_locate_with_buy'=>$send_locate_with_buy,
                'resend_locate_date'=>$request->resend_locate_date,
                'hide'=>$request->hide,
                'text_hide_ar'=>$request->text_hide_ar,
                'text_hide_en'=>$request->text_hide_en,
                'groub_num'=>$request->groub_num,
                'groub_price_a'=>$request->groub_price_a,
                'groub_price_b'=>$request->groub_price_b,
                'groub_price_c'=>$request->groub_price_c,
                'price_baby'=>$request->price_baby
            ]);
            foreach($request->images as $image){
                $image_path = $this->uploud($image);
                Image::create([
                    'event_id' => $event->id,
                    'image' => $image_path
                ]);
            }
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function delete($id){
        try {
            Event::find($id)->delete();
            Payment::where('event_id',$id)->delete();
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function edit($id){
        try {
            $event = Event::where('id',$id)->first();
            return view('admin.subject.edit',compact('event'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function update(Request $request){
        try {
            if($request->image == null){
                $image = $request->old_image;
            }else{
                $image = $this->uploud($request->image);
            }

            if($request->type_send == 'phone'){
                $phone = true;
                $email = false;
            }elseif($request->type_send == 'email'){
                $phone = false;
                $email = true;
            }else{
                $phone = true;
                $email = true;
            }

            if($request->send_with_buy == 'true'){
                $send_with_buy = true;
            }else{
                $send_with_buy = false;
            }
            if($request->send_locate_with_buy == 'true'){
                $send_locate_with_buy = true;
            }else{
                $send_locate_with_buy = false;
            }
            Event::where('id',$request->id)->first()->update([
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'desc_en'=>$request->desc_en,
                'desc_ar'=>$request->desc_ar,
                'color_background'=>$request->color_background,
                'color_button'=>$request->color_button,
                'master_image'=>$image,
                'show_date'=>$request->show_date,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'email_send'=>$email,
                'phone_send'=>$phone,
                'send_with_buy'=>$send_with_buy,
                'event'=>false, // true = is event , != is subject
                'price_normal'=>null,
                'price_vip'=>null,
                'price_a'=>$request->price_a,
                'price_b'=>$request->price_b,
                'price_c'=>$request->price_c,
                'chair_normal'=>null,
                'chair_vip'=>null,
                'chair_a'=>$request->chair_a,
                'chair_b'=>$request->chair_b,
                'chair_c'=>$request->chair_c,
                'resend_date'=>$request->resend_date,
                'locate'=>$request->locate,
                'send_locate_with_buy'=>$send_locate_with_buy,
                'resend_locate_date'=>$request->resend_locate_date,
                'hide'=>$request->hide,
                'text_hide_ar'=>$request->text_hide_ar,
                'text_hide_en'=>$request->text_hide_en,
                'groub_num'=>$request->groub_num,
                'groub_price_a'=>$request->groub_price_a,
                'groub_price_b'=>$request->groub_price_b,
                'groub_price_c'=>$request->groub_price_c,
                'price_baby'=>$request->price_baby
            ]);
            if($request->images != null){
                Image::where('event_id',$request->id)->delete();
                foreach($request->images as $image){
                    $image_path = $this->uploud($image);
                    Image::create([
                        'event_id' => $request->id,
                        'image' => $image_path
                    ]);
                }
            }
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function subscripe($id){
        try{
            $datas = Payment::where('payment_status',true)->where('event_id',$id)->paginate(env("paginate_num"));
            foreach($datas as $data){
                $data->name_event = Event::select('id','title_ar')->where('id',$data->event_id)->first()->title_ar;
                if($data->normal){
                    $data->grade = 'normal';
                }
                if($data->vip){
                    $data->grade = 'vip';
                }
                if($data->a){
                    $data->grade = 'a';
                }
                if($data->b){
                    $data->grade = 'b';
                }
                if($data->c){
                    $data->grade = 'c';
                }
            }
            return view('admin.subject.subscripe',compact('id','datas'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function subscripeStore(Request $request){
        try{
            $id = $request->id;
            $datas = Payment::where('payment_status',true)->where('name', 'like',$request->name)->paginate(env("paginate_num"));
            foreach($datas as $data){
                $data->name_event = Event::select('id','title_ar')->where('id',$data->event_id)->first()->title_ar;
            }
            return view('admin.subject.subscripe',compact('id','datas'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }
    
    public function deleterPerson($id){
        try {
            Active::find($id)->delete();
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}