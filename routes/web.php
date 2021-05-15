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

Route::prefix('admin')->group(function() {
    Route::name('admin.')->group(function () {

        Route::resource('diagnosis', DiagnosisController::class);
        Route::resource('diagnosis.tanda-dan-gejala', DiagnosisTandaDanGejalaController::class);
        Route::resource('diagnosis.penyebab', DiagnosisPenyebabController::class);

        Route::resource('intervensi', IntervensiController::class);
        Route::resource('intervensi.tindakan', IntervensiTindakanController::class);

        Route::resource('luaran', LuaranController::class);
        Route::resource('luaran.kriteria-hasil', LuaranKriteriaHasilController::class);

    });
});

Route::prefix('perawat')->group(function() {

    Route::view('login', 'perawat.login')->name('perawat.halaman.login');
    Route::post('login', [AkunPerawatController::class, "login"])->name('perawat.login');

    Route::middleware(['auth:perawat'])->group(function () {

        Route::get('profil', [AkunPerawatController::class, "halaman_profil"])->name('perawat.halaman.profil');
        Route::post('profil', [AkunPerawatController::class, "ubah_profil"])->name('perawat.profil.ubah');

        Route::resource('asuhan-keperawatan', AsuhanKeperawatanController::class);
        Route::resource('asuhan-keperawatan.tanda-dan-gejala', TandaDanGejalaPasienController::class);
        Route::resource('asuhan-keperawatan.diagnosis', DiagnosisPasienController::class)->shallow();

        Route::resource('diagnosis-pasien.intervensi-pasien', IntervensiPasienController::class);

    });

});
