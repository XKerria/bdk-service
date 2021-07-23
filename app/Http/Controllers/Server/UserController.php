<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\FirmRequest;
use App\Http\Requests\Server\UserRequest;
use App\Libs\Query\FindAllQueryChain;
use App\Models\Firm;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request) {
        $chain = new FindAllQueryChain(User::query(), $request->query());
        if (!$request->has('page')) return $chain->handle()->get();
        return $chain->handle()->paginate($request->query('size', 20), ['*'], 'page', $request->query('page', 1));
    }

    function show(User $user) {
        return $user;
    }

    function store(UserRequest $request) {
        $user = User::create($request->validated());
        return $user->fresh();
    }

    function update(UserRequest $request, User $user) {
        $user->fill($request->validated())->save();
        return $user->fresh();
    }

    function destroy(User $user) {
        return $user->delete();
    }
}
