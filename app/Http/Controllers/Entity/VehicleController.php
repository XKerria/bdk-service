<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    function index(Request $request) {
        $params = $request->query();
        return Vehicle::resolve($params)->page($params);
    }

    function show(Vehicle $vehicle) {
        return $vehicle;
    }

    function store(VehicleRequest $request) {
        $vehicle = Vehicle::create($request->validated());
        return $vehicle->fresh();
    }

    function update(VehicleRequest $request, Vehicle $vehicle) {
        $vehicle->fill($request->validated())->save();
        return $vehicle->fresh();
    }

    function destroy(Vehicle $vehicle) {
        return $vehicle->delete();
    }
}
