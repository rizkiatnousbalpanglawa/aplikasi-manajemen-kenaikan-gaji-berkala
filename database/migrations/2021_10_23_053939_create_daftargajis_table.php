<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftargajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftargajis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawais_id');
            $table->string('jabatan_lama');
            $table->string('jabatan_baru');
            $table->bigInteger('gaji_pokok');
            $table->bigInteger('tunjangan_jabatan');
            $table->bigInteger('tunjangan_kesejahteraan_keluarga');
            $table->bigInteger('total_gaji');
            $table->date('tanggal_masuk');
            $table->date('berkala_gaji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftargajis');
    }
}
