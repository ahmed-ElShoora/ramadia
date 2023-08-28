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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('phone');
            $table->String('email');
            $table->String('event_name');
            $table->String('type_ticket');
            $table->String('note');
            $table->integer('ticket_price');
            $table->integer('organize_event');
            $table->integer('locate_event');
            $table->integer('Types_para');
            $table->integer('food');
            $table->integer('organizer_helper');
            $table->integer('rate');
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
        Schema::dropIfExists('rates');
    }
};
