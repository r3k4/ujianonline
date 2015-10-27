<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama'); //nama kelas
            $table->string('keterangan'); //keterangan mengenai kelas
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
        Schema::drop('ref_kelas');
    }
}
