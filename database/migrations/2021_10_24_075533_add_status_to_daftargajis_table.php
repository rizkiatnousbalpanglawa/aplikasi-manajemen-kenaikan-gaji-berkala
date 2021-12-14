<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToDaftargajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftargajis', function (Blueprint $table) {
            $table->enum('disetujui',['belum','sudah'])->default('belum')->after('berkala_gaji');
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
            $table->dropColumn('disetujui');
        });
    }
}
