<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsSoalAcakToMstTopikSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_topik_soal', function (Blueprint $table) {
            $table->enum('is_soal_acak', [0, 1])->default(0);
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
            $table->dropColumn('is_soal_acak');
        });
    }
}
