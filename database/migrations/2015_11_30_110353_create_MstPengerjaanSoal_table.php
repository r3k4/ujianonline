<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstPengerjaanSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_pengerjaan_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mst_user_id'); //id user level siswa yg mengerjakan soal
            $table->integer('mst_topik_soal_id'); //relas ke tabel mst_topik_soal
            $table->datetime('waktu_mulai'); // waktu mulai mengerjakan 
            $table->datetime('waktu_selesai')->nullable()->default(null); //waktu selesai mengerjakan soal
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
        Schema::drop('mst_pengerjaan_soal');
    }
}
