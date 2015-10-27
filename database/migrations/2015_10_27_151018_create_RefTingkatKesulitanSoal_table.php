<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefTingkatKesulitanSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_tingkat_kesulitan_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama'); //nama level kesulitan soal
            $table->string('keterangan'); //keterangan mengenai level soal
            $table->timestamps();
        });

        $data_insert = [
              ['id'=>1, 'nama' => 'Sulit'],
              ['id' => 2, 'nama' => 'Sedang'],
              ['id' => 3, 'nama' => 'Mudah']
            ];
        \DB::table('ref_tingkat_kesulitan_soal')->insert($data_insert);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ref_tingkat_kesulitan_soal');
    }
}
