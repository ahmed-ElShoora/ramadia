<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;

class PaymentsExport implements FromCollection
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
        return Payment::where('event_id',$this->id)->where('payment_status',true)->get();
    }
}
