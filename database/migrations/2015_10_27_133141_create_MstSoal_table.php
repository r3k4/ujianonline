<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->text('soal'); //berisi soal yg hendak diberikan kepada siswa
            $table->integer('mst_topik_soal_id'); //relasi ke tabel ref_soal
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
        Schema::drop('mst_soal');
    }
}
