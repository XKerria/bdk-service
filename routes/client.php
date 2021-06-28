<?php


use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\BannerController;
use App\Http\Controllers\Client\BrandController;
use App\Http\Controllers\Client\FirmController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::apiResource('/banners', BannerController::class);
Route::apiResource('/firms', FirmController::class);
Route::apiResource('/brands', BrandController::class);
