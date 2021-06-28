<?php

use App\Http\Controllers\Common\BucketController;
use App\Http\Controllers\Server\BannerController;
use App\Http\Controllers\Server\BrandController;
use App\Http\Controllers\Server\BrandSeriesController;
use App\Http\Controllers\Server\SeriesController;
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

Route::get('/sts', [BucketController::class, 'sts']);

Route::get('/brands/sync', [BrandController::class, 'sync']);

Route::apiResource('/banners', BannerController::class);
Route::apiResource('/brands', BrandController::class);
Route::apiResource('/series', SeriesController::class);
Route::apiResource('/brands/{brand}/series', BrandSeriesController::class);

