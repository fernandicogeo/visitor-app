<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('tanggal');
            $table->string('waktu');
            $table->string('tujuan');
            $table->string('keperluan');
            $table->string('keterangan');
            $table->string('tanggal_reschedule')->nullable();
            $table->string('waktu_reschedule')->nullable();
            $table->string('status')->nullable();
            $table->string('status_reschedule')->nullable();
            $table->string('waktu_checkin')->nullable();
            $table->string('waktu_checkout')->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
