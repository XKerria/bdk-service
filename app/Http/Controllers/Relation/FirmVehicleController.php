<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmVehicleController extends Controller
{
    function index(Request $request, Firm $firm) {
        $params = $request->query();
        return $firm->vehicles()->resolve($params)->page($params);
    }

    function store(VehicleRequest $request, Firm $firm) {
        $vehicle = $firm->vehicles()->create($request->validated());
        return $vehicle->fresh();
    }
}
