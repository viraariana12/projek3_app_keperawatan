<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelDiagnosisKeperawatanTandaDanGejala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_keperawatan_tanda_dan_gejala', function (Blueprint $table) {
            $table->foreignId('id_diagnosis_keperawatan');
            $table->foreignId('id_tanda_dan_gejala');
            $table->tinyInteger('objektif');
            $table->tinyInteger('mayor');
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
        Schema::dropIfExists('diagnosis_keperawatan_tanda_dan_gejala');
    }
}
