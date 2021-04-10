<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelDiagnosisKeperawatanIntervensiKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_keperawatan_intervensi_keperawatan', function (Blueprint $table) {
            $table->foreignId('id_diagnosis_keperawatan')->nullable();
            $table->foreignId('id_intervensi_keperawatan')->nullable();
            $table->tinyInteger('utama');
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
        Schema::dropIfExists('diagnosis_keperawatan_intervensi_keperawatan');
    }
}
