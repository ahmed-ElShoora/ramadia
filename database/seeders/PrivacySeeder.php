<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'var'=>'privacy_ar',
            'value'=>'image',
        ]);
        DB::table('settings')->insert([
            'var'=>'privacy_en',
            'value'=>'image',
        ]);
    }
}
