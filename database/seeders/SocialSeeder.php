<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'var'=>'logo',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'logo_nav',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'phone',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'twiter',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'email',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'facebook',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'instagram',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'snapchat',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'tiktok',
            'value'=>'image',
        ]);
    }
}
