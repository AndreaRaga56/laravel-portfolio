<?php

use Illuminate\Support\Env;

return [



    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [env('APP_FRONTEND_URL', 'https://default.it')],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
