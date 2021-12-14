<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKetuaToDaftargajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftargajis', function (Blueprint $table) {
            $table->enum('diteruskan',['sudah','belum'])->default('belum')->after('disetujui');
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
            $table->dropColumn('diteruskan');
        });
    }
}
