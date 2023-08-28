<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Traits\UplodeTrait;
use Throwable;


class SliderController extends Controller
{
    use UplodeTrait;
    public function create(){
        try {
            return view('admin.slider.create');
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function store(Request $request){
        try {
            $image = $this->uploud($request->image);
            Slider::create([
                'image'=>$image,
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'desc_ar'=>$request->desc_ar,
                'desc_en'=>$request->desc_en
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function edit($id){
        try {
            $data = Slider::where('id',$id)->first();
            return view('admin.slider.edit',compact('data'));
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
            Slider::find($request->id)->update([
                'image'=>$image,
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'desc_ar'=>$request->desc_ar,
                'desc_en'=>$request->desc_en
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function delete($id){
        try {
            Slider::find($id)->delete();
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}
