<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id'     => env('FACEBOOK_ID', '1863309813709887'),
        'client_secret' => env('FACEBOOK_SECRET', '195f17c66ed5bcc775bb0c422091ad8b'),
        'redirect'      => env('FACEBOOK_URL', "http://80pwv2.anontech.info/auth/facebook/callback"),
    ],
    'search' => [
        'enabled' => env('SEARCH_ENABLED', false),
        'hosts' => explode(',', env('SEARCH_HOSTS')),
    ],

];
