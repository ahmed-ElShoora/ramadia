<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Throwable;

class SettingController extends Controller
{
    public function index(){
        try {
            $data_logo = Setting::where('var','logo')->first()->value;
            $data_logo_nav = Setting::where('var','logo_nav')->first()->value;
            $email = Setting::where('var','email')->first()->value;
            $phone = Setting::where('var','phone')->first()->value;
            $twiter = Setting::where('var','twiter')->first()->value;
            $facebook = Setting::where('var','facebook')->first()->value;
            $instagram = Setting::where('var','instagram')->first()->value;
            $snapchat = Setting::where('var','snapchat')->first()->value;
            $tiktok = Setting::where('var','tiktok')->first()->value;
            return response()->json([
                'status'=>true,
                'msg'=>'',
                'data'=>[
                    'logo'=>asset('/'.$data_logo),
                    'logo_nav_bar'=>asset('/'.$data_logo_nav),
                    'email'=>$email,
                    'phone'=>$phone,
                    'twiter'=>$twiter,
                    'facebook'=>$facebook,
                    'instagram'=>$instagram,
                    'snapchat'=>$snapchat,
                    'tiktok'=>$tiktok,
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

    public function privacy(){
        try {
            return response()->json([
                'status'=>true,
                'msg'=>'',
                'data'=>Setting::where('var','privacy_'.App::getLocale())->first()->value
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
