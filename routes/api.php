<?php

use App\Http\Controllers\Admin\MasterKeperawatan\SDKI\DiagnosisController;
use App\Http\Controllers\Admin\MasterKeperawatan\SDKI\TandaDanGejala\TandaDanGejalaController;
use App\Http\Controllers\Admin\MasterKeperawatan\SLKI\LuaranController;
use App\Http\Controllers\Admin\MasterKeperawatan\Tautan\DiagnosisLuaranController;
use App\Http\Controllers\Admin\MasterKeperawatan\Tautan\LuaranDiagnosisController;
use Illuminate\Http\Request;
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

Route::prefix('admin')->group(function() {

    Route::prefix('master-keperawatan')->group(function() {

        Route::prefix('sdki')->group(function() {

            Route::apiResource('diagnosis', DiagnosisController::class);
            Route::apiResource('tanda-dan-gejala', TandaDanGejalaController::class);

            Route::get('diagnosis/{diagnosis}/luaran',[DiagnosisLuaranController::class, "index"]);
            Route::post('diagnosis/{diagnosis}/luaran',[DiagnosisLuaranController::class, "store"]);
            Route::delete('diagnosis/{diagnosis}/luaran',[DiagnosisLuaranController::class, "destroy"]);

        });

        Route::prefix('slki')->group(function() {

            Route::apiResource('luaran', LuaranController::class);

            Route::get('luaran/{luaran}/diagnosis',[LuaranDiagnosisController::class, "index"]);
            Route::post('luaran/{luaran}/diagnosis',[LuaranDiagnosisController::class, "store"]);
            Route::delete('luaran/{luaran}/diagnosis',[LuaranDiagnosisController::class, "destroy"]);

        });

        Route::prefix('siki')->group(function() {

        });

    });

});
