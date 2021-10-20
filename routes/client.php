<?php


use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\BannerController;
use App\Http\Controllers\Client\BlackController;
use App\Http\Controllers\Client\BrandController;
use App\Http\Controllers\Client\BrandSeriesController;
use App\Http\Controllers\Client\FirmController;
use App\Http\Controllers\Client\FirmVehicleController;
use App\Http\Controllers\Client\SeriesController;
use App\Http\Controllers\Client\SeriesVehicleController;
use App\Http\Controllers\Client\VehicleController;
use App\Http\Controllers\Client\WechatController;
use App\Http\Controllers\Common\BucketController;
use Illuminate\Support\Facades\Route;


Route::get('/sts', [BucketController::class, 'sts']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/wechat/login', [WechatController::class, 'login']);
Route::post('/wechat/decrypt', [WechatController::class, 'decrypt']);

Route::apiResource('/banners', BannerController::class);
Route::apiResource('/brands', BrandController::class);
Route::apiResource('/series', SeriesController::class);
Route::apiResource('/firms', FirmController::class);
Route::apiResource('/vehicles', VehicleController::class);
Route::apiResource('/blacks', BlackController::class);

Route::apiResource('/brands/{brand}/series', BrandSeriesController::class);
Route::apiResource('/series/{series}/vehicles', SeriesVehicleController::class);
Route::apiResource('/firms/{firm}/vehicles', FirmVehicleController::class)->only(['index']);
