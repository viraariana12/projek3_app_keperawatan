<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelSubKategoriDiagnosisKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kategori_diagnosis_keperawatan', function (Blueprint $table) {
            $table->bigIncrements('id_sub_kategori_diagnosis_keperawatan');
            $table->string('nama');
            $table->foreignId('id_kategori_diagnosis_keperawatan')->nullable();
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
        Schema::dropIfExists('sub_kategori_diagnosis_keperawatan');
    }
}
