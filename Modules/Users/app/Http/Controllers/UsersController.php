<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Users\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailConfirmation;

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

    public function created()
    {
        return view('users::created');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => ['required', 'string', 'max:255'],
            'username'         => ['required', 'string', 'max:255', 'unique:users'],
            'email'            => ['required', 'email', 'unique:users,email'],
            'password'         => ['required', 'string', 'min:8'],
            'confirm-password' => ['required', 'string', 'same:password'],
        ]);

        try {
            User::create([
                'name'          => $validated['name'],
                'username'      => $validated['username'],
                'email'         => $validated['email'],
                'password'      => bcrypt($validated['password']),
            ]);

            Mail::to($validated['email'])->send(new EmailConfirmation($validated['email']));

            return redirect('/new-chibi');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
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

    public function confirmEmail(Request $request)
    {
        // Get the email from the query string
        $email = $request->query('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect('/')->with('error', 'Invalid email address.');
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->update([
                'email_verified_at' => now(),
            ]);

            return redirect('/login')->with('success', 'Email confirmed successfully! You can now login.');
        } else {
            return redirect('/')->with('error', 'User not found.');
        }
    }
}
