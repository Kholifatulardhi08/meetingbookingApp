<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('snack');
            $table->foreignId('user_id')->references('id')->on('users'); //createBY
            $table->foreignId('room_id')->references('id')->on('rooms');
            $table->foreignId('instance_id')->references('id')->on('instances');
            $table->dateTime('start_date')->default(DB::raw('CURRENT_TIMESTAMP')); //gantiDateTime
            $table->dateTime('end_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('start_time')->useCurrent();
            $table->timestamp('end_time')->useCurrent();
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
        Schema::dropIfExists('bookings');
    }
}
