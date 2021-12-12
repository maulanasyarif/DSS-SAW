<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approve_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('approve_id')->references('id')->on('approve')->onDelete('cascade');
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
        Schema::dropIfExists('approve_penilaian');
    }
}