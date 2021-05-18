<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelIntervensiKeperawatanPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervensi_keperawatan_pasien', function (Blueprint $table) {
            $table->bigIncrements('id_intervensi_keperawatan_pasien');
            $table->foreignId('id_diagnosis_keperawatan_pasien')->nullable();
            $table->foreignId('id_intervensi_keperawatan')->nullable();
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
        Schema::dropIfExists('intervensi_keperawatan_pasien');
    }
}
