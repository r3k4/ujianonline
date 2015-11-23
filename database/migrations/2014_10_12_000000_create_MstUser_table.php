<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama'); //nama user/penggunga
            $table->string('email')->unique(); //alamat email user
            $table->string('password', 60); //password user
            $table->integer('ref_user_level_id'); //level atau role yg dimiliki oleh user
            $table->enum('aktif', [0,1])->default(0); //status user, aktif atau terblokir
            $table->rememberToken(); //token ini digunakan pada saat login, mengenali identitas user(kebutuhan khusus saat authentikasi dan authorisasi program)
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
        Schema::drop('mst_user');
    }
}
