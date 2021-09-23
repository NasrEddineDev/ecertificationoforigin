<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
Broadcast::channel('ch1', function ($notification) {
    return true; //$notification;
});

Broadcast::channel('pending-certificate-channel', function ($notification) {
    return true; //$notification;
});

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('dri_notification', function ($notification) {
    return $notification;
});

Broadcast::channel('new-account-channel', function ($notification) {
    return $notification;
});
