<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Libs\Query\FindAllQueryChain;
use App\Models\Black;
use Illuminate\Http\Request;

class BlackController extends Controller
{
    function index(Request $request) {
        $chain = new FindAllQueryChain(Black::query(), $request->query());
        if (!$request->has('page')) return $chain->handle()->orderByRaw('convert(`name` using gbk) asc')->get();
        return $chain->handle()->paginate($request->query('size', 20), ['*'], 'page', $request->query('page', 1));
    }

    function show(Black $black) {
        return $black;
    }

    function destroy(Black $black) {
        return $black->delete();
    }
}
