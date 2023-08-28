<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Support\Facades\App;
use Throwable;

class AboutController extends Controller
{
    public function index(){
        try {
            $image = Setting::where('var','about_image')->first()->value;
            $text = Setting::where('var','about_'.App::getLocale())->first()->value;
            return response()->json([
                'status'=>true,
                'msg'=>'',
                'data'=>[
                    'image'=>asset('/'.$image),
                    'text'=>$text,
                ]
            ]);
        }catch (Throwable $e){
            return response()->json([
                'status'=>false,
                'msg'=>'',
                'error-code'=>7001
            ]);
        }
    }

    public function sliders(){
        try {
            $datas = Slider::select(
                'image','title_'.App::getLocale().' as title','desc_'.App::getLocale().' as desc'
            )->get();
            foreach($datas as $data){
                $data->image = asset('/'.$data->image);
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
