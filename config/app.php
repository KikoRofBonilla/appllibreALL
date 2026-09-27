<?php

return [
    'name' => env('APP_NAME', 'AppLlibre'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => 'Europe/Brussels',
    'locale' => env('APP_LOCALE', 'ca'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'ca'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'ca_ES'),
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    'previous_keys' => array_filter(explode(',', (string) env('APP_PREVIOUS_KEYS', ''))),
    'maintenance' => [
        'driver' => 'file',
    ],
];
