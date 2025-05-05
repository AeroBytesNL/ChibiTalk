<?php

namespace App\Broadcasting;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Modules\Users\Models\User;

class ChatChannel implements ShouldBroadcast
{
    public $user;

    /**
     * Create a new channel instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * The broadcast event data.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'user' => $this->user, // Send the user data or other relevant info
        ];
    }

    /**
     * Get the channels the user is allowed to join.
     *
     * @param User $user
     * @return Channel
     */
    public function join(User $user)
    {
        // You can add logic to verify if the user can join the channel
        // For example, only authorized users should be allowed to join
        return new Channel('chat.' . $user->id);
    }

    /**
     * The event's channel.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('chat.' . $this->user->id);
    }
}
