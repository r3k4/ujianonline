<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstKelasUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_kelas_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mst_user_id'); //user yg mengikuti kelas ini
            $table->integer('ref_kelas_id'); //relasi ke tabel utama kelas
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
        Schema::drop('mst_kelas_user');
    }
}
