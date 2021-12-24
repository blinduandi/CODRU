<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */


    'facebook' => [
        'client_id' => '512140076736520',
        'client_secret' => '1b7bae8619b5382525fc689c7251e713',
        'redirect' => 'https://127.0.0.1:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id'     => '813288594638-huhr13qpc8co9n56149dfja79eei9t8d.apps.googleusercontent.com',
        'client_secret' => 'w2Vevng0Thv4LyXSpQqG5ih5',
        'redirect'      => 'http://127.0.0.1:8000/auth/google/callback',
    ],
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
