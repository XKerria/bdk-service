<?php

use App\Http\Controllers\Common\BucketController;
use App\Http\Controllers\Server\AuthController;
use App\Http\Controllers\Server\BannerController;
use App\Http\Controllers\Server\BrandController;
use App\Http\Controllers\Server\BrandSeriesController;
use App\Http\Controllers\Server\FirmController;
use App\Http\Controllers\Server\FirmUserController;
use App\Http\Controllers\Server\SeriesController;
use App\Http\Controllers\Server\SettingController;
use App\Http\Controllers\Server\TestController;
use App\Http\Controllers\Server\UserController;
use App\Http\Controllers\Server\VehicleController;
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



Route::post('/auth/login', [AuthController::class, 'login']);

Route::apiResource('/settings', SettingController::class)->only(['index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/sts', [BucketController::class, 'sts']);
    Route::get('/auth/user', [AuthController::class, 'user']);
    Route::get('/auth/refresh', [AuthController::class, 'refresh']);

    Route::apiResource('/settings', SettingController::class)->except(['index']);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/brands', BrandController::class);

});



