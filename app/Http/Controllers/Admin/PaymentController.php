<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ActivesExport;
use App\Exports\CobonsExport;
use App\Exports\PaymentsExport;
use App\Exports\RatesExport;
use App\Http\Controllers\Controller;
use App\Models\Active;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class PaymentController extends Controller
{
    public function index(){
        try {
            $datas = Payment::where('payment_status',false)->paginate(env("paginate_num"));
            foreach($datas as $data){
                $data->name_event = Event::select('id','title_ar')->where('id',$data->event_id)->first()->title_ar;
            }
            return view('admin.not-pay.index',compact('datas'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function moveStatus($id){
        try{
            Payment::find($id)->update([
                'status'=>true
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function addActive(){
        try{
            $datas = Event::select('id','title_ar')->get();
            return view('admin.active.create',compact('datas'));
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function addActiveStore(Request $request){
        try{
            Active::create([
                'phone'=>$request->phone,
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'event_id'=>$request->event_id
            ]);
            return redirect()->back();
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function exportPayments($id){
        try{
            return Excel::download(new PaymentsExport($id), 'payments.xlsx');
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function exportRates(){
        try{
            return Excel::download(new RatesExport, 'rates.xlsx');
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function exportCobons($id){
        try{
            return Excel::download(new CobonsExport($id), 'cobon.xlsx');
        }catch (Throwable $e){
            return view('error.error');
        }
    }

    public function exportActive($id){
        try{
            return Excel::download(new ActivesExport($id), 'active.xlsx');
        }catch (Throwable $e){
            return view('error.error');
        }
    }
}
