<?php

namespace Modules\Homes\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Modules\Homes\Models\Message;
use Illuminate\Support\Str;
use Modules\Homes\Models\Channel;
use App\Events\MessageSent;

class ChatRoom extends Component
{
    public $message;
    public $homeId;
    public $channelId;
    public $messages = [];

    protected $listeners = ['echo:chat,MessageSent' => 'receiveMessage'];

    public function mount()
    {
        $urlPath = request()->path(); // e.g. "homes/5722394a-aaae-4379-9f21-2f94535a7104"
        preg_match('/homes\/([^\/\?]+)/', $urlPath, $matches);
        $this->homeId = $matches[1] ?? null;

        $channel = Channel::where('name', request()->query('channel'))->first() ?? Channel::first();

        $this->messages = Message::with('user')
            ->where('channel_id', $channel->id)
            ->latest()
            ->take(20)
            ->get()
            ->reverse();

        $this->channelId = $channel->id;
    }

    public function sendMessage(): void
    {
        if (trim($this->message) === '') return;

        $messageId = Str::uuid();

        $message = [
            'id'         => $messageId,
            'home_id'    => $this->homeId,
            'channel_id' => $this->channelId,
            'user_id'    => Auth::id(),
            'content'    => $this->message,
            'created_at' => now(),
        ];

        $messageDb = Message::create($message);

        $messageDb->load(['user:id,name,profile_image_url']);

        event(new MessageSent($messageDb));

        $this->messages->push($messageDb);

        $this->message = '';
    }

    public function render()
    {
        return view('homes::livewire.chat-room', [
            'messages' => $this->messages,
            'channelId' => $this->channelId,
        ]);
    }
}
