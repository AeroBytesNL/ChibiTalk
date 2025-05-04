<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Homes\Models\Home;
use Modules\Users\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard::index', [
            'user' => User::with('homes')
                ->where('id', Auth::id())
                ->first(),
        ]);
    }

    public function create()
    {
        return view('dashboard::create');
    }

    public function store(Request $request) {}

    public function show($id)
    {
        return view('dashboard::show');
    }

    public function edit($id)
    {
        return view('dashboard::edit');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
