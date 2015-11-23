<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstPasswordResetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_password_resets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->index(); // email yg digunakan untuk reset password
            $table->string('token')->index(); //token untuk inisialisasi email yg hendak di reset
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
        Schema::drop('mst_password_resets');
    }
}
