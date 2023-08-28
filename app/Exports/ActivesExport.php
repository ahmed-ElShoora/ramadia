<?php

namespace App\Exports;

use App\Models\Active;
use Maatwebsite\Excel\Concerns\FromCollection;

class ActivesExport implements FromCollection
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
        return Active::select(
            'name','phone','email','event_id'
        )->where('event_id',$this->id)->get();
    }
}
