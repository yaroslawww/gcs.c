<?php

return [
    'page' => [
        'slug_url' => env('CMS_PAGES_SLUG_URL', env('APP_URL', 'http://localhost')),
        'templates_dir' => env('CMS_PAGES_TEMPLATES_DIR', '/page/templates'),
    ]
];
