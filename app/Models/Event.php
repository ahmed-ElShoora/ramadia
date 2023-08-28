<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_ar',
        'title_en',
        'desc_en',
        'desc_ar',
        'color_background',
        'color_button',
        'master_image',

        'show_date',
        'start_date',
        'end_date',

        'email_send',
        'phone_send',
        
        'send_with_buy',

        'event', // true = is event , != is subject
        'price_normal',
        'price_vip',
        'price_a',
        'price_b',
        'price_c',
        'chair_normal',
        'chair_vip',
        'chair_a',
        'chair_b',
        'chair_c',
        'resend_date',
        'send_locate_with_buy',
        'resend_locate_date',
        'locate',
        'hide',
        'text_hide_ar',
        'text_hide_en',
        
        'groub_num',
        'price_baby',
        'groub_price_normal',
        'groub_price_vip',
        'groub_price_a',
        'groub_price_b',
        'groub_price_c',
    ];
}
