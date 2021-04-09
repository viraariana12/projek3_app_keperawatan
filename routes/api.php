<?php

use App\Http\Controllers\Admin\MasterKeperawatan\SDKI\DiagnosisController;
use App\Http\Controllers\Admin\MasterKeperawatan\SDKI\Relasi\DiagnosisTandaDanGejalaController;
use App\Http\Controllers\Admin\MasterKeperawatan\SDKI\TandaDanGejala\TandaDanGejalaController;
use App\Http\Controllers\Admin\MasterKeperawatan\SIKI\Intervensi\IntervensiController;
use App\Http\Controllers\Admin\MasterKeperawatan\SLKI\LuaranController;
use App\Http\Controllers\Admin\MasterKeperawatan\SDKI\Relasi\DiagnosisLuaranController;
use App\Http\Controllers\Admin\MasterKeperawatan\SLKI\Relasi\LuaranDiagnosisController;
use App\Http\Controllers\Admin\PasienController;

use App\Http\Controllers\Perawat\AkunPerawatController;
use App\Http\Controllers\Perawat\AsuhanKeperawatan\AsuhanKeperawatanPerawatController;
use App\Http\Controllers\Perawat\TimPerawat\AnggotaTimPerawatController;
use App\Http\Controllers\Perawat\TimPerawat\KetuaTimPerawatController;
use App\Http\Controllers\Perawat\TimPerawat\TimPerawatController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('perawat')->group(function() {

    Route::post('masuk', [AkunPerawatController::class, "masuk"]);
    Route::post('daftar', [AkunPerawatController::class, "daftar"]);

    Route::middleware(['auth:sanctum'])->group(function () {

        Route::get('profil', [AkunPerawatController::class, "lihat_profil"]);
        Route::post('profil', [AkunPerawatController::class, "ubah_profil"]);

        Route::get('tim', [TimPerawatController::class, "daftar_tim"]);
        Route::post('tim', [TimPerawatController::class, "buat_tim"]);

        Route::get('tim/{tim}/anggota', [AnggotaTimPerawatController::class, "daftar_anggota"]);
        Route::post('tim/{tim}/anggota', [KetuaTimPerawatController::class, "tambah_anggota"]);
        Route::delete('tim/{tim}/anggota', [KetuaTimPerawatController::class, "hapus_anggota"]);

        Route::delete('tim/{tim}/keluar', [AnggotaTimPerawatController::class, "keluar_tim"]);

        Route::get('askep',[AsuhanKeperawatanPerawatController::class, "index"]);
        Route::post('askep',[AsuhanKeperawatanPerawatController::class, "store"]);

    });

});

Route::prefix('admin')->group(function() {

    Route::apiResource('pasien', PasienController::class);

    Route::prefix('master-keperawatan')->group(function() {

        Route::prefix('sdki')->group(function() {

            Route::apiResource('diagnosis', DiagnosisController::class);
            Route::apiResource('diagnosis.luaran', DiagnosisLuaranController::class);
            Route::apiResource('diagnosis.tanda-dan-gejala', DiagnosisTandaDanGejalaController::class);


            Route::apiResource('tanda-dan-gejala', TandaDanGejalaController::class);

        });

        Route::prefix('slki')->group(function() {

            Route::apiResource('luaran', LuaranController::class);
            Route::apiResource('luaran.diagnosis', LuaranDiagnosisController::class);


        });

        Route::prefix('siki')->group(function() {

            Route::apiResource('intervensi', IntervensiController::class);

        });

    });

});
