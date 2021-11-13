<?php

namespace App\Http\Controllers\Entity;

use App\Exceptions\IncorrectPasswordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index(Request $request) {
        $params = $request->query();
        return Admin::resolve($params)->page($params);
    }

    function show(Admin $admin) {
        return $admin;
    }

    function store(AdminRequest $request) {
        $admin = Admin::create($request->validated());
        return $admin->fresh();
    }

    function update(AdminRequest $request, Admin $admin) {
        $admin->fill($request->validated())->save();
        return $admin->fresh();
    }

    function destroy(Admin $admin) {
        return $admin->delete();
    }

    function login(AdminLoginRequest $request) {
        $data = $request->validated();
        $admin = Admin::where('phone', $data['phone'])->firstOrFail();
        if (!Hash::check($data['password'], $admin->password)) throw new IncorrectPasswordException();
        return $admin->generateToken('admin-token');
    }

    function refresh(Request $request) {
        $admin = $request->user();
        return $admin->generateToken('admin-token');
    }

    function current(Request $request) {
        return $request->user();
    }
}
