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
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('keperluan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('kendaraan')->nullable();
            $table->string('jenis_kendaraan')->nullable();
            $table->string('nopol_kendaraan')->nullable();
            $table->string('tanggal_reschedule')->nullable();
            $table->string('waktu_reschedule')->nullable();
            $table->string('status')->nullable();
            $table->string('status_reschedule')->nullable();
            $table->string('waktu_checkin')->nullable();
            $table->string('satpam_checkin')->nullable();
            $table->string('waktu_checkout')->nullable();
            $table->string('satpam_checkout')->nullable();
            $table->string('id_schedule')->nullable();
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
