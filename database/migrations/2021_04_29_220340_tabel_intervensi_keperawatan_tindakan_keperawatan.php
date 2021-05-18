<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelIntervensiKeperawatanTindakanKeperawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervensi_keperawatan_tindakan_keperawatan', function (Blueprint $table) {
            $table->foreignId('id_intervensi_keperawatan')->nullable();
            $table->foreignId('id_tindakan_keperawatan')->nullable();
            $table->foreignId('id_jenis_tindakan_keperawatan')->nullable();
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
        Schema::dropIfExists('intervensi_keperawatan_tindakan_keperawatan');
    }
}
