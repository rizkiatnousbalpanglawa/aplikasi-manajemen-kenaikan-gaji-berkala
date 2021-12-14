<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToDaftarGaji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftargajis', function (Blueprint $table) {
            $table->integer('nilai_tanggung_jawab')->after('jumlah_presensi');
            $table->integer('nilai_kerjasama')->after('nilai_tanggung_jawab');
            $table->integer('nilai_loyalitas')->after('nilai_kerjasama');
            $table->integer('nilai_inovasi')->after('nilai_loyalitas');
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
            $table->dropColumn('nilai_tanggung_jawab');
            $table->dropColumn('nilai_kerjasama');
            $table->dropColumn('nilai_loyalitas');
            $table->dropColumn('nilai_inovasi');
        });
    }
}
