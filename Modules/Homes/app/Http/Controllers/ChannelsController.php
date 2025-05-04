<?php

namespace Modules\Homes\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Homes\Models\Channel;

class ChannelsController extends Controller
{
    public function index()
    {
        return view('homes::index');
    }

    public function create()
    {
        return view('homes::create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255', 'unique:channels'],
            'description' => ['nullable', 'string', 'max:255'],
            'home_id'     => ['required', 'string', 'exists:homes,id'],
            'type'        => ['nullable', 'string', 'max:255'],
            'is_public'   => ['nullable', 'boolean'],
        ]);

        try {

            $channelId = Str::uuid();

            Channel::create([
                'id'          => $channelId,
                'name'        => $validated['name'],
                'description' => $validated['description'],
                'type'        => $validated['type'],
                'is_public'   => $validated['is_public'] ?? 0,
                'home_id'     => $validated['home_id'],
                'channel_id'  => $channelId,
            ]);

            return redirect()->route('homes.show', $validated['home_id'])->with('success', 'Channel created.');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
