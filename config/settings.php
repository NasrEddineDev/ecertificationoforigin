<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default hash driver that will be used to hash
    | passwords for your application. By default, the bcrypt algorithm is
    | used; however, you remain free to modify this option if you wish.
    |
    | Supported: "bcrypt", "argon", "argon2id"
    |
    */

    'ORIGINATOR_ID' => 'CACI-6523985471',
    'َAGCE_SSL_CERT_FILE_PATH' => 'data/',
    'َAGCE_SSL_KEY_FILE_PATH' => 'data/',
    'ROUND_STAMP_AR_FILE_PATH' => 'data/documents/round_stamp_ar.png',
    'ROUND_STAMP_EN_FILE_PATH' => 'data/documents/round_stamp_en.png',
    
    /*
    |--------------------------------------------------------------------------
    | Bcrypt Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the Bcrypt algorithm. This will allow you
    | to control the amount of time it takes to hash the given password.
    |
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the Argon algorithm. These will allow you
    | to control the amount of time it takes to hash the given password.
    |
    */

    // 'argon' => [
    //     'memory' => 1024,
    //     'threads' => 2,
    //     'time' => 2,
    // ],
    'CURRENCY' => [
        'DZD' => 'Algerian Dinar',
        'SAR' => 'Saudi Arabian Riyal',     
        'AED' => 'Arabic Emarate Dirham',
        'CNY' => 'Chinese Tuan',
        'EUR' => 'Euro',
        'USD' => 'US Dollar',     
        'CAD' => 'Canadian Dollar'
    ],
    'UNIT' => [
        'KG' => 'Kilogram (kg), for mass (weight)',   
        'T' => 'Tonne (T), for mass (weight)',  
        'U' => 'Unit (u), for number of units',  
        'L' => 'Litre (L), for capacity (volume)',
        'M' => 'Metre (M), for length (distance)',
        'M²' => 'Square Metre (M²), for area'
        // env('C') => env('Degrees Celsius (C), for temperature'),          
        // env('K') => env('kelvin (K), for temperature'),     
        // env('S') => env('second (s), for time')
    ],
];
