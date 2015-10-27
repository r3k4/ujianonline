<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstJawabanSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_jawaban_siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mst_jawaban_soal_id');
            $table->integer('mst_user_id');
            $table->string('komentar'); //komentar berfungsi saat koreksi jawaban
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
        Schema::drop('mst_jawaban_siswa');
    }
}
