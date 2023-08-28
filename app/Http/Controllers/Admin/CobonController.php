<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cobon;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;
use Throwable;
class CobonController extends Controller
{
    public function index(){

        try {
            $datas = Cobon::latest()->paginate(env("paginate_num"));
            return view('admin.cobon.index',compact('datas'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function delete($id){
        try {
            if ($delete = Cobon::find($id)){
                $delete->delete();
            }
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }


    public function store(Request $request){
        try {
            Cobon::create([
                'symbol'=>$request->symbol,
                'persent'=>$request->persent,
                'uses'=>$request->uses
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function getDataCobon($id){
        $name = Cobon::where('id',$id)->first()->symbol;
        $datas = Payment::where('payment_status',true)->where('cobon',$name)->paginate(env("paginate_num"));
        foreach($datas as $data){
            $data->name_event = Event::where('id',$data->event_id)->first()->title_ar;
        }
        return view('admin.cobon.data_use',compact('datas','id'));
    }
}
