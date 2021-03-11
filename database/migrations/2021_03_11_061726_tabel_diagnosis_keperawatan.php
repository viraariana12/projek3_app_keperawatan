<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelDiagnosisKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_keperawatan', function (Blueprint $table) {
            $table->bigIncrements('id_diagnosis_keperawatan');
            $table->string('nama');
            $table->string('kode');
            $table->text('definisi');
            $table->foreignId('id_sub_kategori_diagnosis_keperawatan')->nullable();
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
        Schema::dropIfExists('diagnosis_keperawatan');
    }
}
