<?php

namespace App\Http\Controllers\Entity;

use App\Exceptions\IncorrectPasswordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(Request $request) {
        $params = $request->query();
        return User::resolve($params)->page($params);
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

    function login(UserLoginRequest $request) {
        $data = $request->validated();
        $user = User::where('phone', $data['phone'])->firstOrFail();
        if (!Hash::check($data['password'], $user->password)) throw new IncorrectPasswordException();
        return $user->generateToken('user-token');
    }

    function refresh(Request $request) {
        $user = $request->user();
        return $user->generateToken('user-token');
    }

    function current(Request $request) {
        return $request->user()->load('firm');
    }
}
