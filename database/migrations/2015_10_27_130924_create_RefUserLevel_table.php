<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefUserLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_user_level', function (Blueprint $table) {
            $table->increments('id'); //ID level atau role user
            $table->string('nama'); //nama level atau role
            $table->timestamps();
        });


        $data_insert = [
              ['id'=>1, 'nama' => 'Administrator'],
              ['id' => 2, 'nama' => 'Guru'],
              ['id' => 3, 'nama' => 'Siswa']
            ];
        \DB::table('ref_user_level')->insert($data_insert);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ref_user_level');
    }
}
