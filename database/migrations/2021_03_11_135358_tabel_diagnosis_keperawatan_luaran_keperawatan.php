<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelDiagnosisKeperawatanLuaranKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_keperawatan_luaran_keperawatan', function (Blueprint $table) {
            $table->foreignId('id_diagnosis_keperawatan');
            $table->foreignId('id_luaran_keperawatan');
            $table->tinyInteger('utama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosis_keperawatan_luaran_keperawatan');
    }
}
