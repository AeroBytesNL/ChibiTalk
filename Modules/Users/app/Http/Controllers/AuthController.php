<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('users::login');
    }

    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (!Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return back()->withInput()->with('error', 'Verkeerde login!');
        }

        return redirect(route('dashboard.index'))->with('success', 'You are now logged in!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'You are now logged out!');
    }

    public function create()
    {
        return view('users::create');
    }

    public function store(Request $request) {}

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
