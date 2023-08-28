<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Http\Traits\SendTrait;

class SendTicket extends Command
{
    use SendTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:tiket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = Event::select('id','email_send','phone_send')->where('resend_date',Carbon::now()->format('Y-m-d'))->get();
        foreach($events as $event){
            $users = Payment::select('id','phone','email')->where('event_id',$event->id)->where('payment_status',true)->get();
            foreach($users as $user){
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
            }
        }
    }
}
