<?php


use App\Http\Controllers\Client\BannerController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/banners', BannerController::class);
