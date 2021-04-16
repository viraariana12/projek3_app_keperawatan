<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelDiagnosisKeperawatanKondisiKlinis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_keperawatan_kondisi_klinis', function (Blueprint $table) {
            $table->foreignId('id_diagnosis_keperawatan');
            $table->foreignId('id_kondisi_klinis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosis_keperawatan_kondisi_klinis');
    }
}
