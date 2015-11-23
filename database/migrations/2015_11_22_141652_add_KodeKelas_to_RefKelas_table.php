<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKodeKelasToRefKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_kelas', function (Blueprint $table) {
            $table->string('kode_kelas'); //tambahan di tabel ref_kelas, berfungsi untuk inisialisasi kode kelas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ref_kelas', function (Blueprint $table) {
            $table->dropColumn('kode_kelas');
        });
    }
}
