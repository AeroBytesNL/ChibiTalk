<?php

namespace App\Services;

use Pusher\Pusher;

class PusherService
{
    protected Pusher $pusher;

    public function __construct()
    {
        $this->pusher = new Pusher(
            env('services.pusher.key'),
            env('services.pusher.secret'),
            env('services.pusher.app_id'),
            [
                'cluster' => config('services.pusher.cluster'),
                'useTLS' => true,
            ]
        );
    }

    public function send(string $channel, string $event, array $data): void
    {
        $this->pusher->trigger($channel, $event, $data);
    }
}
