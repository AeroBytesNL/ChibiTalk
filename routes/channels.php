<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{channelId}', function ($user, $channelId) {
    return true; // TODO: TESTING, CHANGE TO 'return $user->canAccessChannel($channelId);'
});
