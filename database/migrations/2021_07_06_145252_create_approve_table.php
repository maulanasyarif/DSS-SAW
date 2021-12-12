<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approve', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis');
            $table->foreignId('siswa_id')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_siswa', 70);
            $table->foreignId('jenispengajuan_id', 10);
            $table->string('file', 255);
            $table->string('kelas', 12);
            $table->string('nomor_hp', 12);
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
        Schema::dropIfExists('approve');
    }
}