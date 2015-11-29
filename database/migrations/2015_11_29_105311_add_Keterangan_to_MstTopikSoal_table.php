<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeteranganToMstTopikSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_topik_soal', function (Blueprint $table) {
            $table->text('keterangan')->after('mst_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_topik_soal', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
    }
}
