<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->references('id')->on('approve')->onDelete('cascade');
            $table->foreignId('penilaian_id')->references('id')->on('penilaian')->onDelete('cascade');
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
        Schema::dropIfExists('penilaian_siswa');
    }
}