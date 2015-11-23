<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstJawabanSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_jawaban_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mst_soal_id'); //relasi ke tabel mst_soal
            $table->string('jawaban'); // berisi jawaban, contoh A,B,C, dst
            $table->enum('is_benar', [1, 0])->default(0); //jika value satu, maka kondisinya adalah jawaban tsb benar
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
        Schema::drop('mst_jawaban_soal');
    }
}
