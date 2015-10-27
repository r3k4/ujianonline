<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama'); // nama atau judul soal
            $table->integer('waktu_pengerjaan'); //dlm satuan menit
            $table->integer('mst_user_id');
            $table->integer('mst_kelas_id');
            $table->enum('is_jawaban_acak', [1,0])->default(0); //untuk membuat jawaban acak atau tidak
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
        Schema::drop('ref_soal');
    }
}
