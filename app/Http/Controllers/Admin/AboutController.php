<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Traits\UplodeTrait;
use Throwable;


class AboutController extends Controller
{
    use UplodeTrait;
    public function index(){
        try {
            $datas = Slider::paginate(env("paginate_num"));
            $image = Setting::where('var','about_image')->first()->value;
            $desc_ar = Setting::where('var','about_ar')->first()->value;
            $desc_en = Setting::where('var','about_en')->first()->value;
            return view('admin.about.index',compact('datas','image','desc_ar','desc_en'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function store(Request $request){
        try {
            if($request->image == null){
                $image = $request->old_image;
            }else{
                $image = $this->uploud($request->image);
            }
            Setting::where('var','about_image')->first()->update([
                'value'=>$image
            ]);
            $desc_ar = Setting::where('var','about_ar')->first()->update([
                'value'=>$request->desc_ar
            ]);
            $desc_en = Setting::where('var','about_en')->first()->update([
                'value'=>$request->desc_en
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}
