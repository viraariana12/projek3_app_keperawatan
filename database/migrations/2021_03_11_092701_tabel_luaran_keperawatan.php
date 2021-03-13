<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelLuaranKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luaran_keperawatan', function (Blueprint $table) {
            $table->bigIncrements('id_luaran_keperawatan');
            $table->string('nama');
            $table->string('kode');
            $table->text('definisi');
            $table->foreignId('id_indikator_luaran')->nullable();
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
        Schema::dropIfExists('luaran_keperawatan');
    }
}
