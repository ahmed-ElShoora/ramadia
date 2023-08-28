<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Traits\SendTrait;
use App\Models\Cobon;
use App\Models\Event;


class TelrController extends Controller
{
    use SendTrait;

    public function checkOut(Request $request){
        
        $price = 0;
        $group = false;
        
        if($request->num_baby == null){
            $num_baby = 0;
        }else{
            $num_baby = $request->num_baby;
        }
        if($request->num_person == null){
            $num_person = 1;
        }else{
            $num_person = $request->num_person;
        }
        $event_data = Event::select(
            'event', // true = is event , != is subject
            'price_normal',
            'price_vip',
            'price_a',
            'price_b',
            'price_c',
            
            'groub_num',
            'price_baby',
            'groub_price_normal',
            'groub_price_vip',
            'groub_price_a',
            'groub_price_b',
            'groub_price_c',
        )->where('id',$request->id)->first();
        // return [
        //     '$num_baby'=>$num_baby,
        //     '$num_person'=>$num_person,
        //     'event'=>$event_data
        // ];
        $price += $num_baby*$event_data->price_baby;
        
        if($event_data->event){
            if($event_data->groub_num <= $num_person){
                if($request->type == 'group_normal'){
                    $price += $num_person*$event_data->groub_price_normal;
                }else{
                    $price += $num_person*$event_data->groub_price_vip;
                }
            }else{
                if($request->type == 'normal'){
                    $price += $num_person*$event_data->price_normal;
                }else{
                    $price += $num_person*$event_data->price_vip;
                }
            }
        }else{
            if($event_data->groub_num <= $num_person){
                if($request->type == 'group_a'){
                    $price += $num_person*$event_data->groub_price_a;
                }elseif($request->type == 'group_b'){
                    $price += $num_person*$event_data->groub_price_b;
                }else{
                    $price += $num_person*$event_data->groub_price_c;
                }
            }else{
                if($request->type == 'a'){
                    $price += $num_person*$event_data->price_a;
                }elseif($request->type == 'b'){
                    $price += $num_person*$event_data->price_b;
                }else{
                    $price += $num_person*$event_data->price_c;
                }
            }
        }
        //return $price;
        if($event_data->groub_num <= $num_person){
            $group = true;
        }
        if($request->cobon != null){
            $cobon_count = Cobon::where('symbol',$request->cobon)->where('uses','!=',0)->count();
            if($cobon_count != 0){
                $data_cobon = Cobon::where('symbol',$request->cobon)->first();
                $data_cobon->update([
                    'uses'=>$data_cobon->uses-1
                ]);
                $persentage = $data_cobon->persent;
                $tax = $price * $persentage / 100;
                $price = $price - $tax;
            }
        }
        $payment = Payment::create([
            'event_id'=>$request->id,
            'type'=>$request->type,
            'name'=>$request->name_fir.' '.$request->name_sur,
            'age'=>$request->age,
            'email'=>$request->email,
            'phone'=>$request->tel,
            'town'=>$request->town,
            'note'=>$request->note,
            'price'=>$price,
            'payment_status'=>false,
            'status'=>false,
            'cobon'=>$request->cobon,
            'baby_num'=>$num_baby,
            'num_person'=>$num_person,
            'group'=>$group,
            'baby_num_del'=>$num_baby,
            'num_person_del'=>$num_person,
        ]);
        $telrManager = new \TelrGateway\TelrManager();
        $billingParams = [
                'first_name' => $request->name_fir,
                'sur_name' => $request->name_sur,
                'address_1' => $request->town,
                'address_2' => '',
                'city' => $request->town,
                'zip' => '11231',
                'country' => 'SA',
                'email' => $request->email,
            ];
        return $telrManager->pay($payment->id, $price, 'Buy Event Ticket ID : '.$payment->id, $billingParams)->redirect();
    }




    public function success(Request $request) {
        $telrManager = new \TelrGateway\TelrManager();

        $transaction = $telrManager->handleTransactionResponse($request);
        $user_id = explode(" : ",$transaction->response['order']['description'])[1];
        $user = Payment::where('id',$user_id)->first();
        $event = Event::where('id',$user->event_id)->first();
        
        
        
        if($user->type == 'normal'){
             Event::where('id',$user->event_id)->first()->update([
                 'chair_normal'=>$event->chair_normal-1
                 ]);
        }elseif($user->type == 'vip'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_vip'=>$event->chair_vip-1
                 ]);
        }elseif($user->type == 'a'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_a'=>$event->chair_a-1
                 ]);
        }elseif($user->type == 'b'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_b'=>$event->chair_b-1
                 ]);
        }elseif($user->type == 'c'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_c'=>$event->chair_c-1
                 ]);
        }elseif($user->type == 'group_normal'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_normal'=>$event->chair_normal-$user->num_person
                 ]);
        }elseif($user->type == 'group_vip'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_vip'=>$event->chair_vip-$user->num_person
                 ]);
        }elseif($user->type == 'group_a'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_a'=>$event->chair_a-$user->num_person
                 ]);
        }elseif($user->type == 'group_b'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_b'=>$event->chair_b-$user->num_person
                 ]);
        }elseif($user->type == 'group_c'){
            Event::where('id',$user->event_id)->first()->update([
                 'chair_c'=>$event->chair_c-$user->num_person
                 ]);
        }
        
        
        
        
        
        
        Payment::where('id',$user_id)->first()->update([
            'payment_status'=>true
        ]);
                if($event->email_send){
                    $this->sendEmail($user->email,'
عزيزي العميل ، نؤكد حجزك لفعالية رمادية 
لا تحتار ولا تختار 
كل مابين الابيض و الاسود بين يدك
للملاحظات و الاستفسارات الرجاء التواصل معنا عن طريق منصات التواصل الاجتماعية او على الرقم 0543811788
رابط التكت : 
https://ramadia.sa/ticket-55'.$user->id.'432'.$user->id.'1a'
                );
                }
                if($event->phone_send){
                    $this->sendSms($user->phone,'
عزيزي العميل ، نؤكد حجزك لفعالية رمادية ، لتجربة زمان و مكان مختلف
للملاحظات و الاستفسارات الرجاء التواصل معنا عن طريق منصات التواصل الاجتماعية او على الرقم 0543811788
رابط التكت : 
https://ramadia.sa/ticket-55'.$user->id.'432'.$user->id.'1a'
);
                }
            
        
        return view('front.telr.suc');
    }
    public function cancel(Request $request) {
        return view('front.telr.cancel');
    }
    public function declined(Request $request) {
        return view('front.telr.decline');
    }
}
