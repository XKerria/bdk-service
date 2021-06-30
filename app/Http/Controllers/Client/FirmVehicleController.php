<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmVehicleController extends Controller
{
    function index(Firm $firm) {
        return $firm->vehicles;
    }
}
