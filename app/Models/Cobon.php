<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobon extends Model
{
    use HasFactory;
    protected $fillable = [
        'symbol','persent','uses'
    ];
}
