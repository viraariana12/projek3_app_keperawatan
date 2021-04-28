<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelAsuhanKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asuhan_keperawatan', function (Blueprint $table) {
            $table->bigIncrements('id_asuhan_keperawatan');
            $table->foreignId('id_pasien')->nullable();
            $table->foreignId('id_tim_perawat')->nullable();
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
        Schema::dropIfExists('asuhan_keperawatan');
    }
}
