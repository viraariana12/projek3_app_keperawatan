<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\Buku\SDKI\Diagnosis\DiagnosisController;
use App\Http\Controllers\Web\Admin\Buku\SDKI\Diagnosis\DiagnosisPenyebabController;
use App\Http\Controllers\Web\Admin\Buku\SDKI\Diagnosis\DiagnosisTandaDanGejalaController;
use App\Http\Controllers\Web\Perawat\AkunPerawatController;
use App\Http\Controllers\Web\Perawat\AsuhanKeperawatan\AsuhanKeperawatanController;
use App\Http\Controllers\Web\Perawat\AsuhanKeperawatan\TandaDanGejalaPasienController;
use App\Http\Controllers\Web\Perawat\AsuhanKeperawatan\DiagnosisPasienController;
use App\Http\Controllers\Web\Perawat\AsuhanKeperawatan\DiagnosisPasien\IntervensiPasienController;
use App\Http\Controllers\Web\Admin\Buku\SIKI\Intervensi\IntervensiController;
use App\Http\Controllers\Web\Admin\Buku\SLKI\Luaran\LuaranController;
use App\Http\Controllers\Web\Admin\Buku\SIKI\Intervensi\IntervensiTindakanController;
use App\Http\Controllers\Web\Admin\Buku\SLKI\Luaran\LuaranKriteriaHasilController;
use App\Http\Controllers\Web\Admin\Pengguna\PerawatController;
use App\Http\Controllers\Web\Admin\Pengguna\PasienController;
use App\Http\Controllers\Web\Admin\Buku\SDKI\Tautan\DiagnosisIntervensiController;
use App\Http\Controllers\Web\Admin\Buku\SDKI\Tautan\DiagnosisLuaranController;
use App\Http\Controllers\Web\Admin\AuthController as AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin');
});

Route::name('admin.')->group(function () {

    Route::group(["prefix" => "admin"], function(){

        Route::get('login', [AdminAuthController::class, "halaman_login"])->name('halaman-login');
        Route::post('login', [AdminAuthController::class, "login"])->name('login');

        Route::group(["middleware" => "auth:web"], function() {

            Route::resource('perawat', PerawatController::class);
            Route::resource('pasien', PasienController::class);

            Route::resource('diagnosis', DiagnosisController::class);
            Route::resource('diagnosis.tanda-dan-gejala', DiagnosisTandaDanGejalaController::class);
            Route::resource('diagnosis.penyebab', DiagnosisPenyebabController::class);

            Route::resource('diagnosis.intervensi', DiagnosisIntervensiController::class);
            Route::resource('diagnosis.luaran', DiagnosisLuaranController::class);

            Route::resource('intervensi', IntervensiController::class);
            Route::resource('intervensi.tindakan', IntervensiTindakanController::class);

            Route::resource('luaran', LuaranController::class);
            Route::resource('luaran.kriteria-hasil', LuaranKriteriaHasilController::class);

        });
    });
});

Route::name('perawat.')->group(function () {

    Route::prefix('perawat')->group(function() {

        Route::view('login', 'perawat.login')->name('halaman-login');
        Route::post('login', [AkunPerawatController::class, "login"])->name('login');

        Route::middleware(['auth:perawat'])->group(function () {

            Route::get('profil', [AkunPerawatController::class, "halaman_profil"])->name('halaman.profil');
            Route::post('profil', [AkunPerawatController::class, "ubah_profil"])->name('profil.ubah');

            Route::resource('asuhan-keperawatan', AsuhanKeperawatanController::class);
            Route::resource('asuhan-keperawatan.tanda-dan-gejala', TandaDanGejalaPasienController::class);
            Route::resource('asuhan-keperawatan.diagnosis', DiagnosisPasienController::class)->shallow();

            Route::resource('diagnosis-pasien.intervensi-pasien', IntervensiPasienController::class);

        });

    });
});
