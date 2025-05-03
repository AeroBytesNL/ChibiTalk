<?php

namespace Modules\Homes\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Homes\Models\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HomesController extends Controller
{
    public function index()
    {
        return view('homes::index');
    }

    public function create()
    {
        return view('homes::create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon_url'    => ['nullable', 'string'],
            'is_public'   => ['nullable', 'boolean'],
        ]);

        try {
            $homeId = Str::uuid();

            $home = Home::create([
                'id'          => $homeId,
                'name'        => $validated['name'],
                'description' => $validated['description'],
                'icon_url'    => $validated['icon_url'] ?? null,
                'owner_id'    => Auth::id(),
                'is_public'   => $validated['is_public'] ?? true,
            ]);

            DB::table('homes_users')->insert([
                'home_id'     => $homeId,
                'user_id'     => Auth::id(),
                'nickname'    => null,
                'joined_at'   => now(),
            ]);

            // change to home show
            return redirect(route('dashboard.index'))->with('success', 'Home created!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        return view('homes::show');
    }

    public function edit($id)
    {
        return view('homes::edit');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
