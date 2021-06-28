<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    function index() {
        return Firm::all();
    }
}
