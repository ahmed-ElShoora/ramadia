<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->String('title_ar');
            $table->String('title_en');
            $table->Text('desc_en');
            $table->Text('desc_ar');
            $table->String('color_background');
            $table->String('color_button');
            $table->String('master_image');
            $table->date('show_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('email_send');
            $table->boolean('phone_send');
            $table->boolean('send_with_buy');
            $table->boolean('event'); // true = is event , != is subject
            $table->integer('price_normal')->nullable();
            $table->integer('price_vip')->nullable();
            $table->integer('price_a')->nullable();
            $table->integer('price_b')->nullable();
            $table->integer('price_c')->nullable();
            $table->integer('chair_normal')->nullable();
            $table->integer('chair_vip')->nullable();
            $table->integer('chair_a')->nullable();
            $table->integer('chair_b')->nullable();
            $table->integer('chair_c')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
