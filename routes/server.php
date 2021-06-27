<?php

use App\Http\Controllers\Common\BucketController;
use App\Http\Controllers\Server\BannerController;
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

Route::apiResource('/banners', BannerController::class);
