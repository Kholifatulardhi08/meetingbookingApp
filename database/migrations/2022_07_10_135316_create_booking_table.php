<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->bigInteger('id_rooms')->unsigned();
            $table->bigInteger('id_instances')->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_rooms')->references('id')->on('rooms');
            $table->foreign('id_instances')->references('id')->on('instances');
            $table->timestamps('start_date');
            $table->timestamps('end_date');
            $table->string('pantry');
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
        Schema::dropIfExists('booking');
    }
}
