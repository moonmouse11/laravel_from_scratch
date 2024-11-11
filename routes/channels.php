<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel(
    channel: 'App.Models.User.{id}',
    callback: static function ($user, $id) {
        return (int)$user->id === (int)$id;
    }
);
