<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'event_name',
        'type_ticket',
        'note',
        'ticket_price',
        'organize_event',
        'locate_event',
        'Types_para',
        'food',
        'organizer_helper',
        'rate',
    ];
}
