<?php

namespace Modules\Homes\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Homes\Models\Channel;
use Modules\Homes\Models\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Modules\Homes\Models\Message;
use Modules\Users\Models\User;

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
            $defaultChannelId = Str::uuid();

            Home::create([
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

            DB::table('channels')->insert([
                'id'          => $defaultChannelId,
                'name'        => 'General',
                'description' => 'The default general room',
                'type'        => 1,
                'is_public'   => 1,
                'home_id'     => $homeId,
                'channel_id'  => $defaultChannelId,
                'created_at'  => now(),
            ]);

            return redirect(route('homes.show', $homeId))->with('success', 'Home created!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong!');
        }
    }

    public function show(Request $request, $homeId)
    {
        $channelName = $request->query('channel', null);

        if (!$channelName) {
            $channel = Channel::first();
        } else {
            $channel = Channel::where('name', $channelName)->first();
        }

        $messages = $channel
            ? Message::where('channel_id', $channel->id)->get()
            : collect();

        return view('homes::show', [
            'messages'        => $messages,
            'channel_id'      => $channel->id,
            'current_channel' => $channel,
            'home'            => Home::with('owner', 'users', 'channels')->findOrFail($homeId),
            'user'            => User::with('homes')
                ->where('id', Auth::id())
                ->first(),
        ]);
    }

    public function invite(Request $request, $homeId)
    {
        $home = Home::with('owner', 'users', 'channels')->findOrFail($homeId);

        return view('homes::invite', [
            'homeName' => $home->name,
            'homeUrl'  =>  url('/invite/' . $homeId),
        ]);
    }

    public function invitePost(Request $request, $homeId)
    {
        $home = Home::with('owner', 'users', 'channels')->findOrFail($homeId);

        $alreadyJoined = DB::table('homes_users')
            ->where('home_id', $homeId)
            ->where('user_id', Auth::id())
            ->exists();

        if (!$alreadyJoined) {
            DB::table('homes_users')->insert([
                'home_id'     => $homeId,
                'user_id'     => Auth::id(),
                'nickname'    => null,
                'joined_at'   => now(),
            ]);

            return redirect(route('homes.show', $homeId))->with('success', 'Home joined!');
        }

        return redirect(route('homes.show', $homeId))->with('error', 'Home already joined!');
    }

    public function edit($id)
    {
        return view('homes::edit');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
