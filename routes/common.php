<?php

use App\Http\Controllers\Common\OssController;
use Illuminate\Support\Facades\Route;

Route::get('/oss/sign', [OssController::class, 'sign']);
Route::get('/oss/callback', [OssController::class, 'callback']);
