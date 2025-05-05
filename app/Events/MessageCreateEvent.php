<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class MessageCreateEvent implements ShouldBroadcast
{
    use SerializesModels;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('chat');
    }

    public function broadcastWith()
    {
        return [
            'id'           => $this->message->id,
            'content'      => $this->message->content,
            'user_id'      => $this->message->user_id,
            'created_at'   => $this->message->created_at->toDateTimeString(),
            'user'         => [
                'username' => $this->message->user->username ?? null,
                'icon_url' => $this->message->user->icon_url ?? null,
            ]
        ];
    }
}
