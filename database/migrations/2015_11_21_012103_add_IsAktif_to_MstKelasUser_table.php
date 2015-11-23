<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsAktifToMstKelasUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_kelas_user', function (Blueprint $table) {
            $table->enum('is_aktif', [0, 1])->default(0)->after('ref_kelas_id'); //tambahan kolom di tabel mst_kelas_user, relasi ke ref_kelas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_kelas_user', function (Blueprint $table) {
            $table->dropColumn('is_aktif');
        });
    }
}
