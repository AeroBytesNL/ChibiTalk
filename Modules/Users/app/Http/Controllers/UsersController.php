<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Users\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('users::index');
    }

    public function create()
    {
        return view('users::create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'email', 'unique:users,email'],
            'password'         => ['required', 'string', 'min:8'],
            'confirm-password' => ['required', 'string', 'same:password'],
            'anti-bot'         => ['required', 'string', 'max:255'],
        ]);

        if ($validated['anti-bot'] !== config('anti_bot')) {
            return redirect()->back()->with('error', 'Please enter a valid anti bot answer!');
        }

        dd($validated);
    }

    public function show($id)
    {
        return view('users::show');
    }

    public function edit($id)
    {
        return view('users::edit');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
