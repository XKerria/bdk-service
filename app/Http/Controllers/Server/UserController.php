<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Libs\Query\FindAllQueryChain;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request) {
        $chain = new FindAllQueryChain(User::query(), $request->query());
        if (!$request->has('page')) return $chain->handle()->get();
        return $chain->handle()->paginate($request->query('size', 20), ['*'], 'page', $request->query('page', 1));
    }

    function store() {

    }
}
