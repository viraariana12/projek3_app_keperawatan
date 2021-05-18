<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelTandaDanGejalaAsuhanKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanda_dan_gejala_asuhan_keperawatan', function (Blueprint $table) {
            $table->foreignId('id_tanda_dan_gejala')->nullable();
            $table->foreignId('id_asuhan_keperawatan')->nullable();
            $table->foreignId('id_perawat')->nullable();
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
        Schema::dropIfExists('tanda_dan_gejala_asuhan_keperawatan');
    }
}
