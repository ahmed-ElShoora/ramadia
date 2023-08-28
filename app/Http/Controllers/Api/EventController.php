<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\App;

class EventController extends Controller
{
    public function index($id){
        try {
            $datas = Event::select(
                'id',
                'event as type',
                'title_'.App::getLocale().' as title',
                'desc_'.App::getLocale().' as desc',
                'color_background',
                'color_button',
                'master_image',
                'start_date',
                'price_normal',
                'price_vip',
                'price_a',
                'price_b',
                'price_c',
                'chair_normal',
                'chair_vip',
                'chair_a',
                'chair_b',
                'chair_c',
                'hide',
                'text_hide_'.App::getLocale().' as text',
                'groub_num',
                'price_baby',
                'groub_price_normal',
                'groub_price_vip',
                'groub_price_a',
                'groub_price_b',
                'groub_price_c',
            )->where('show_date','<=',Carbon::now())->where('end_date','>=',Carbon::now())->whereRaw('WEEKDAY(events.start_date) = '.$id)->simplePaginate(4);
            foreach($datas as $data){
                $data->master_image = asset('/'.$data->master_image);
                $data->slider_images = Image::where('event_id',$data->id)->get();
                foreach($data->slider_images as $image){
                    $image->image = asset('/'.$image->image);
                }
            }
            return response()->json([
                'status'=>true,
                'msg'=>'',
                'data'=>$datas
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
