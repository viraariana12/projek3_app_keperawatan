<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\Buku\SDKI\Diagnosis\DiagnosisController;
use App\Http\Controllers\API\Admin\Buku\SDKI\Penyebab\PenyebabController;
use App\Http\Controllers\API\Admin\Buku\SDKI\Penyebab\JenisPenyebabController;
use App\Http\Controllers\API\Admin\Buku\SDKI\TandaDanGejala\TandaDanGejalaController;
use App\Http\Controllers\API\Admin\Buku\SDKI\Diagnosis\DiagnosisPenyebabController;
use App\Http\Controllers\API\Admin\Buku\SDKI\Diagnosis\DiagnosisTandaDanGejalaController;

use App\Http\Controllers\API\Admin\Buku\SIKI\Intervensi\IntervensiController;
use App\Http\Controllers\API\Admin\Buku\SIKI\Intervensi\IntervensiTindakanController;

use App\Http\Controllers\API\Admin\Buku\SIKI\Tindakan\TindakanController;
use App\Http\Controllers\API\Admin\Buku\SIKI\Tindakan\JenisTindakanController;

use App\Http\Controllers\API\Admin\Buku\SLKI\Luaran\LuaranController;
use App\Http\Controllers\API\Admin\Buku\SLKI\Indikator\IndikatorController;
use App\Http\Controllers\API\Admin\Buku\SLKI\KriteriaHasil\KriteriaHasilController;
use App\Http\Controllers\API\Admin\Buku\SLKI\Luaran\LuaranKriteriaHasilController;

use App\Http\Controllers\API\Admin\Profil\AuthController as AdminAuthController;
use App\Http\Controllers\API\Admin\Profil\ProfilController as AdminProfilController;

use App\Http\Controllers\API\Perawat\Profil\AuthController as PerawatAuthController;
use App\Http\Controllers\API\Perawat\Profil\ProfilController as PerawatProfilController;
use App\Http\Controllers\API\Perawat\Pengguna\PasienController;
use App\Http\Controllers\API\Admin\Pengguna\PerawatController;

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
Route::name('api.')->group(function () {

    Route::group(["prefix" => "admin", "name" => "admin."], function(){

        Route::post('login', [AdminAuthController::class, "login"]);

        Route::group(["middleware" => "auth:sanctum"], function() {

            Route::group(["middleware" => "admin"], function() {

                // Hanya admin yang bisa mengakses

                Route::post('profil', [AdminProfilController::class, "update_profil"]);

                Route::resource('perawat', PerawatController::class);

                Route::group(["prefix" => "buku", "name" => "buku."], function(){

                    Route::group(["prefix" => "sdki", "name" => "sdki."], function(){

                        Route::resource('diagnosis', DiagnosisController::class);
                        Route::resource('diagnosis.penyebab', DiagnosisPenyebabController::class);
                        Route::resource('diagnosis.tanda-dan-gejala', DiagnosisTandaDanGejalaController::class);

                        Route::resource('penyebab', PenyebabController::class);
                        Route::resource('jenis-penyebab', JenisPenyebabController::class);

                        Route::resource('tanda-dan-gejala', TandaDanGejalaController::class);

                    });

                    Route::group(["prefix" => "siki", "name" => "siki."], function(){

                        Route::resource('intervensi', IntervensiController::class);
                        Route::resource('intervensi.tindakan', IntervensiTindakanController::class);

                        Route::resource('tindakan', TindakanController::class);
                        Route::resource('jenis-tindakan', JenisTindakanController::class);

                    });

                    Route::group(["prefix" => "slki", "name" => "slki."], function(){
                        Route::resource('luaran', LuaranController::class);
                        Route::resource('luaran.kriteria-hasil', LuaranKriteriaHasilController::class);

                        Route::resource('kriteria-hasil', KriteriaHasilController::class);
                        // Route::resource('indikator', IndikatorController::class);
                    });
                });
            });

        });
    });

    Route::group(["prefix" => "perawat", "name" => "perawat."], function(){

        Route::post('login', [PerawatAuthController::class, "login"]);
        Route::post('register', [PerawatAuthController::class, "register"]);

        Route::group(["middleware" => "auth:sanctum"], function() {

            Route::get('profil', [PerawatProfilController::class, "lihat_profil"]);
            Route::post('profil', [PerawatProfilController::class, "update_profil"]);

            Route::group(["middleware" => "perawat"], function() {

                // Perawat yang sudah diaktifkan oleh admin

                Route::resource('pasien', PasienController::class);
            });

        });

    });
});
