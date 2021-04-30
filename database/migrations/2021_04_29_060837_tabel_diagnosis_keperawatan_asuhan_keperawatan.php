<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelDiagnosisKeperawatanAsuhanKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_keperawatan_asuhan_keperawatan', function (Blueprint $table) {
            $table->bigIncrements('id_diagnosis_keperawatan_asuhan_keperawatan');
            $table->foreignId('id_asuhan_keperawatan')->nullable();
            $table->foreignId('id_diagnosis_keperawatan')->nullable();
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
        Schema::dropIfExists('diagnosis_keperawatan_asuhan_keperawatan');
    }
}
