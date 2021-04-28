<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelPerawatTimPerawat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawat_tim_perawat', function (Blueprint $table) {
            $table->foreignId('id_perawat');
            $table->foreignId('id_tim_perawat');
            $table->tinyInteger('ketua');
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
        Schema::dropIfExists('perawat_tim_perawat');
    }
}
