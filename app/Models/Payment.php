<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'type',
        'name',
        'age',
        'email',
        'phone',
        'town',
        'note',
        'price',
        'payment_status',
        'status',
        'cobon',
        'baby_num',
        'num_person',
        'group',
        'baby_num_del',
        'num_person_del',
    ];
}
