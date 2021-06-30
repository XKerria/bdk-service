<?php

use App\Http\Controllers\Common\BucketController;
use App\Http\Controllers\Server\BannerController;
use App\Http\Controllers\Server\BrandController;
use App\Http\Controllers\Server\BrandSeriesController;
use App\Http\Controllers\Server\FirmController;
use App\Http\Controllers\Server\FirmUserController;
use App\Http\Controllers\Server\SeriesController;
use App\Http\Controllers\Server\TestController;
use App\Http\Controllers\Server\UserController;
use App\Http\Controllers\Server\VehicleController;
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


Route::get('/sts', [BucktController::class, 'sts']);

Route::get('/brands/sync', [BrandController::class, 'sync']);

Route::apiResource('/test', TestController::class);
Route::apiResource('/banners', BannerController::class);
Route::apiResource('/brands', BrandController::class);
Route::apiResource('/series', SeriesController::class);
Route::apiResource('/firms', FirmController::class);
Route::apiResource('/users', UserController::class);
Route::apiResource('/firms/{firm}/users', FirmUserController::class);
Route::apiResource('/brands/{brand}/series', BrandSeriesController::class);
Route::apiResource('/vehicles', VehicleController::class);

