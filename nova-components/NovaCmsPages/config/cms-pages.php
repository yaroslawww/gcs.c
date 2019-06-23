<?php

return [
    'page' => [
        'model' => \Yaroslawww\NovaCmsPages\Models\Page::class,
        'slug_url' => env('CMS_PAGES_SLUG_URL', ''),
        'templates_dir' => env('CMS_PAGES_TEMPLATES_DIR', 'page/templates'),
    ]
];
