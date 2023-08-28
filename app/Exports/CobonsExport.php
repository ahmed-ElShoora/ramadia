<?php

namespace App\Exports;

use App\Models\Cobon;
use App\Models\Event;
use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;

class CobonsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $name = Cobon::where('id',$this->id)->first()->symbol;
        $datas = Payment::where('payment_status',true)->where('cobon',$name)->paginate(env("paginate_num"));
        foreach($datas as $data){
            $data->name_event = Event::where('id',$data->event_id)->first()->title_ar;
        }
        return $datas;
    }
}
