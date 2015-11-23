<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstDataUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_data_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mst_user_id'); //relasi dengan tabel mst_user
            $table->string('tempat_lahir'); // tempat lahir user
            $table->date('tgl_lahir'); //tgl lahir user
            $table->enum('jenis_kelamin', ['L', 'P']); //jenis kelamin user
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
        Schema::drop('mst_data_user');
    }
}
