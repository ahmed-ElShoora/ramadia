<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Traits\UplodeTrait;
use Throwable;
use Illuminate\Support\Str;

class ContactUsController extends Controller
{
    use UplodeTrait;
    public function index(){
        try {
            $contacts = Contact::latest()->paginate(env("paginate_num"));
            // for($x = 0; $x<50;$x++){
            //     Contact::create([
            //     'name' => fake()->name(),
            //     'email' => fake()->unique()->safeEmail(),
            //     'phone' => Str::random(5),
            //     'note' => Str::random(10),]);
            // }
            $image = Setting::where('var','contact_image')->first()->value;
            return view('admin.contact.index',compact('contacts','image'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function filter(Request $request){
        try {
            $contacts = Contact::latest();
            if($request->name != null){
                $contacts->where('name', 'like',$request->name);
            }
            if($request->phone != null){
                $contacts->where('phone',$request->phone);
            }
            $contacts = $contacts->get();
            return view('admin.contact.index',compact('contacts'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function updateImage(Request $request){
        try {
            $image = $this->uploud($request->image);
            Setting::where('var','contact_image')->first()->update([
                'value'=>$image
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function delete($id){
        try {
            Contact::find($id)->delete();
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}