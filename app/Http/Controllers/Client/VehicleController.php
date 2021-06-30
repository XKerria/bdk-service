<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\VehicleRequest;
use App\Models\Series;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehicleController extends Controller
{
    function index() {
        return Cache::rememberForever('vehicles', function () {
            return Vehicle::all();
        });
    }

    function store(VehicleRequest $request) {
        return Vehicle::create($request->validated())->fresh();
    }

    function update(VehicleRequest $request, Vehicle $vehicle) {
        $vehicle->fill($request->validated())->save();
        return $vehicle->fresh();
    }
}
