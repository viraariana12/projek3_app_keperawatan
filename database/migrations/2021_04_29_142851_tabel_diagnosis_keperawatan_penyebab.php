<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelDiagnosisKeperawatanPenyebab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_keperawatan_penyebab', function (Blueprint $table) {
            $table->foreignId('id_diagnosis_keperawatan')->nullable();
            $table->foreignId('id_penyebab')->nullable();
            $table->foreignId('id_jenis_penyebab')->nullable();
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
        Schema::dropIfExists('diagnosis_keperawatan_penyebab');
    }
}
