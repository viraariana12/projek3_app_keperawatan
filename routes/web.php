<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\Buku\SDKI\Diagnosis\DiagnosisController;
use App\Http\Controllers\Web\Admin\Buku\SDKI\Diagnosis\DiagnosisTandaDanGejalaController;
use App\Http\Controllers\Web\Perawat\AkunPerawatController;

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
    Route::resource('diagnosis', DiagnosisController::class);
    Route::resource('diagnosis.tanda-dan-gejala', DiagnosisTandaDanGejalaController::class);
});

Route::prefix('perawat')->group(function() {

    Route::view('login', 'perawat.login')->name('perawat.halaman.login');
    Route::post('login', [AkunPerawatController::class, "login"])->name('perawat.login');

    Route::get('profil', [AkunPerawatController::class, "halaman_profil"])->name('perawat.halaman.profil');
    Route::post('profil', [AkunPerawatController::class, "ubah_profil"])->name('perawat.profil.ubah');

});
