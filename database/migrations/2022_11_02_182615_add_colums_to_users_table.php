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
        Schema::table('events', function (Blueprint $table) {
            $table->integer('groub_num');
            $table->integer('price_baby');
            $table->integer('groub_price_normal')->nullable();
            $table->integer('groub_price_vip')->nullable();
            $table->integer('groub_price_a')->nullable();
            $table->integer('groub_price_b')->nullable();
            $table->integer('groub_price_c')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
};
