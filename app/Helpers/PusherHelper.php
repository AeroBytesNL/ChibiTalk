<?php

use App\Helpers\PusherHelper;

if (!function_exists('pusher')) {
    function pusher(): PusherHelper
    {
        return new PusherHelper();
    }
}
