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
            $table->increments('id'); //dari ini nanti bisa digunakan sebagai code untuk invite siswa masuk ke grup kelas
            $table->string('nama'); // nama kelas
            $table->integer('ref_mapel_id'); //relasi ke tabel ref_mapel
            $table->integer('mst_user_id'); // pengajar atau guru yg membuat kelas
            $table->enum('is_open', [0, 1])->default(1); //status kelas, masih bs menerima request siswa br atau tdk
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
