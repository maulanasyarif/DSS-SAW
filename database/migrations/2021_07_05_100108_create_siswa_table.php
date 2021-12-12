<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');;
            $table->string('tapel', 9);          
            $table->string('kelas', 10);
            $table->string('nis', 10)->unique();
            $table->string('nama_siswa', 70);
            $table->string('password', 255);
            $table->string('tempat_lahir', 50);
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin', 10);
            $table->text('alamat');
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
        Schema::dropIfExists('siswa');
    }
}