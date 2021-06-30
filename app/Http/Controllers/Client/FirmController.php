<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\FirmRequest;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    function index() {
        return Firm::all();
    }

    function update(FirmRequest $request, Firm $firm) {
        $firm->fill($request->validated())->save();
        return $firm->fresh();
    }
}
