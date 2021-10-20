<?php

use App\Http\Controllers\Common\BucketController;
use App\Http\Controllers\Server\AuthController;
use App\Http\Controllers\Server\BannerController;
use App\Http\Controllers\Server\BlackController;
use App\Http\Controllers\Server\BrandController;
use App\Http\Controllers\Server\FirmController;
use App\Http\Controllers\Server\SeriesController;
use App\Http\Controllers\Server\SettingController;
use App\Http\Controllers\Server\UserController;
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

    Route::apiResource('/firms', FirmController::class);
    Route::apiResource('/banners', BannerController::class);
    Route::apiResource('/blacks', BlackController::class);
    Route::apiResource('/brands', BrandController::class);
    Route::apiResource('/series', SeriesController::class);
    Route::apiResource('/settings', SettingController::class)->except(['index']);
    Route::apiResource('/users', UserController::class);
});



