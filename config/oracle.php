<?php

return [
    'oracle' => [
        'driver' => 'oracle',
        'tns' => env('DB_TNS', ''),
        'host' => env('DB_HOST', '192.168.0.71'),
        'port' => env('DB_PORT', '1521'),
        'database' => env('DB_DATABASE', 'info360'),
        'username' => env('DB_USERNAME', 'C##INFO360USER'),
        'service_name' => env('DB_SERVICE_NAME', ''),
        'password' => env('DB_PASSWORD', 'Soft7777#'),
        'charset' => env('DB_CHARSET', 'AL32UTF8'),
        'prefix' => env('DB_PREFIX', 'jana_'),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '12c'),
    ],
];
