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
use App\Models\MasterKeperawatan\SIKI\IntervensiTindakan;

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

        Route::group(["prefix" => "buku", "name" => "buku."], function(){

            Route::group(["prefix" => "sdki", "name" => "sdki."], function(){

                Route::apiResource('diagnosis', DiagnosisController::class);
                Route::apiResource('diagnosis.penyebab', DiagnosisPenyebabController::class);
                Route::apiResource('diagnosis.tanda-dan-gejala', DiagnosisTandaDanGejalaController::class);

                Route::apiResource('penyebab', PenyebabController::class);
                Route::apiResource('jenis-penyebab', JenisPenyebabController::class);

                Route::apiResource('tanda-dan-gejala', TandaDanGejalaController::class);

            });

            Route::group(["prefix" => "siki", "name" => "siki."], function(){

                Route::apiResource('intervensi', IntervensiController::class);
                Route::apiResource('intervensi.tindakan', IntervensiTindakan::class);

                Route::apiResource('tindakan', TindakanController::class);

            });

        });


    });
});
