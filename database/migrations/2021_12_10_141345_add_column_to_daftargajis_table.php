<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDaftargajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftargajis', function (Blueprint $table) {
            $table->integer('jumlah_cuti');
            $table->integer('jumlah_izin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftargajis', function (Blueprint $table) {
            $table->dropColumn('jumlah_cuti');
            $table->dropColumn('jumlah_izin');
        });
    }
}
