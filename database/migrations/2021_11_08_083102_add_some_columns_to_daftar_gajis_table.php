<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToDaftarGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftargajis', function (Blueprint $table) {
            $table->integer('jumlah_hari_kerja')->after('diteruskan');
            $table->integer('jumlah_presensi')->after('jumlah_hari_kerja');
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
            $table->dropColumn(['jumlah_hari_kerja', 'jumlah_presensi']);
        });
    }
}
