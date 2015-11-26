<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstTopikSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_topik_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama'); // nama atau judul bank soal
            $table->integer('waktu_pengerjaan'); //dlm satuan menit
            $table->integer('mst_user_id');
            $table->integer('ref_kelas_id');
            $table->integer('ref_tingkat_kesulitan_soal_id'); //relasi ke tabel ref_tingkat_kesulitan_soal
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
        Schema::drop('mst_topik_soal');
    }
}
