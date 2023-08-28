<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Traits\UplodeTrait;
use Throwable;


class SettingController extends Controller
{
    use UplodeTrait;
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
            $privacy_ar = Setting::where('var','privacy_ar')->first()->value;
            $privacy_en = Setting::where('var','privacy_en')->first()->value;
            return view('admin.setting.index',compact('data_logo','tiktok','snapchat','instagram','facebook','twiter','email','phone','data_logo_nav','privacy_en','privacy_ar'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function store(Request $request){
        try {
            if($request->logo == null){
                $logo = $request->old_logo;
            }else{
                $logo = $this->uploud($request->logo);
            }
            Setting::where('var','logo')->first()->update([
                'value'=>$logo
            ]);
            if($request->logo_nav == null){
                $logo_nav = $request->old_logo_nav;
            }else{
                $logo_nav = $this->uploud($request->logo_nav);
            }
            Setting::where('var','logo_nav')->first()->update([
                'value'=>$logo_nav
            ]);
            Setting::where('var','email')->first()->update([
                'value'=>$request->email
            ]);
            Setting::where('var','phone')->first()->update([
                'value'=>$request->phone
            ]);
            Setting::where('var','twiter')->first()->update([
                'value'=>$request->twiter
            ]);
            Setting::where('var','facebook')->first()->update([
                'value'=>$request->facebook
            ]);
            Setting::where('var','instagram')->first()->update([
                'value'=>$request->instagram
            ]);
            Setting::where('var','snapchat')->first()->update([
                'value'=>$request->snapchat
            ]);
            Setting::where('var','tiktok')->first()->update([
                'value'=>$request->tiktok
            ]);
            Setting::where('var','privacy_ar')->first()->update([
                'value'=>$request->privacy_ar
            ]);
            Setting::where('var','privacy_en')->first()->update([
                'value'=>$request->privacy_en
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}
