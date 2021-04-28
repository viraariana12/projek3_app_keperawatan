<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelIntervensiKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervensi_keperawatan', function (Blueprint $table) {
            $table->bigIncrements('id_intervensi_keperawatan');
            $table->string('nama');
            $table->string('kode');
            $table->text('definisi');
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
        Schema::dropIfExists('intervensi_keperawatan');
    }
}
