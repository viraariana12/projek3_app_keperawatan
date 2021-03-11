<?php

use App\Http\Controllers\Admin\MasterKeperawatan\SDKI\DiagnosisController;
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

            Route::resource('diagnosis', DiagnosisController::class);

        });

        Route::prefix('slki')->group(function() {

        });

    });

});
