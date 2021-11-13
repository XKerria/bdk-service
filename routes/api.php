<?php


use App\Http\Controllers\Entity\AdminController;
use App\Http\Controllers\Entity\BannerController;
use App\Http\Controllers\Entity\BlackController;
use App\Http\Controllers\Entity\BrandController;
use App\Http\Controllers\Entity\FirmController;
use App\Http\Controllers\Entity\LogController;
use App\Http\Controllers\Entity\SeriesController;
use App\Http\Controllers\Entity\SettingController;
use App\Http\Controllers\Entity\UserController;
use App\Http\Controllers\Entity\VehicleController;
use App\Http\Controllers\Relation\BrandSeriesController;
use App\Http\Controllers\Relation\FirmVehicleController;
use App\Http\Controllers\Relation\SeriesVehicleController;
use Illuminate\Support\Facades\Route;


Route::post('/admins/login', [AdminController::class, 'login']);
Route::post('/users/login', [UserController::class, 'login']);

Route::apiResource('/banners', BannerController::class)->only(['index']);
Route::apiResource('/blacks', BlackController::class)->only(['index', 'show']);
Route::apiResource('/brands', BrandController::class)->only(['index']);
Route::apiResource('/firms', FirmController::class)->only(['index', 'show']);
Route::apiResource('/series', SeriesController::class)->only(['index', 'show']);
Route::apiResource('/settings', SettingController::class)->only(['index']);
Route::apiResource('/logs', LogController::class)->only(['store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/admins/current', [AdminController::class, 'current']);
    Route::get('/admins/refresh', [AdminController::class, 'refresh']);
    Route::get('/users/current', [UserController::class, 'current']);
    Route::get('/users/refresh', [UserController::class, 'refresh']);

    Route::apiResource('/admins', AdminController::class);
    Route::apiResource('/banners', BannerController::class)->except(['index']);
    Route::apiResource('/blacks', BlackController::class)->except(['index', 'show']);
    Route::apiResource('/brands', BrandController::class)->except(['index']);
    Route::apiResource('/firms', FirmController::class)->except(['index', 'show']);
    Route::apiResource('/logs', LogController::class)->except(['store']);
    Route::apiResource('/series', SeriesController::class)->except(['index', 'show']);
    Route::apiResource('/settings', SettingController::class)->except(['index']);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/vehicles', VehicleController::class)->only(['show', 'update']);

    Route::apiResource('/brands/{brand}/series', BrandSeriesController::class)->only(['index', 'store']);
    Route::apiResource('/firms/{firm}/vehicles', FirmVehicleController::class)->only(['index', 'store']);
    Route::apiResource('/series/{series}/vehicles', SeriesVehicleController::class)->only(['index']);
});
