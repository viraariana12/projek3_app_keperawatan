<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\Buku\SDKI\Diagnosis\DiagnosisController;
use App\Http\Controllers\API\Admin\Buku\SDKI\Penyebab\PenyebabController;
use App\Http\Controllers\API\Admin\Buku\SDKI\TandaDanGejala\TandaDanGejalaController;
use App\Http\Controllers\API\Admin\Buku\SDKI\Diagnosis\DiagnosisPenyebabController;

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
    Route::prefix('admin')->group(function() {
        Route::name('admin.')->group(function () {
            Route::apiResource('diagnosis', DiagnosisController::class);
            Route::apiResource('diagnosis.penyebab', DiagnosisPenyebabController::class);

            Route::apiResource('penyebab', PenyebabController::class);

            Route::apiResource('tanda-dan-gejala', TandaDanGejalaController::class);
        });
    });
});
