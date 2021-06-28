<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\UserRequest;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmUserController extends Controller
{
    function index(Firm $firm) {
        return $firm->users;
    }

    function store(UserRequest $request, Firm $firm) {
        $data = $request->validated();
        $data['password'] = '123456';
        return $firm->users()->create($data)->fresh();
    }
}
