<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard cho admin
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Cấu hình cho admin
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Hoặc App\Models\User::class nếu dùng chung model
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        // Thêm cấu hình cho admins
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens', // Hoặc 'admin_password_reset_tokens' nếu tách bảng
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
