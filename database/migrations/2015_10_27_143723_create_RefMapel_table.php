<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_mapel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama'); //nama mata pelajaran
            $table->string('keterangan'); //keterangan mengenai mata pelajaran
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
        Schema::drop('ref_mapel');
    }
}
