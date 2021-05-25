<?php

return [

    'steps' => [
        'REGISTRATION' => 'Registration',
        'ACTIVATION' => 'Activation',
        'ENTERPRISE' => 'Enterprise',
        'MANAGER' => 'Manager',
        'EXPORT_MANAGER' => 'Export Manager',
        'CONFIRMATION' => 'Confirmation',
    ],

    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],

    'users' => [
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
    ],

    'password_timeout' => 10800,

];
