<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelLuaranKeperawatanKriteriaHasil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luaran_keperawatan_kriteria_hasil', function (Blueprint $table) {
            $table->foreignId('id_luaran_keperawatan')->nullable();
            $table->foreignId('id_kriteria_hasil')->nullable();
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
        Schema::dropIfExists('luaran_keperawatan_kriteria_hasil');
    }
}
