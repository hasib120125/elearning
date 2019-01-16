<?php

return [
    'mode' => 'utf-8',
    'format' => 'A4',
    'author' => '',
    'subject' => '',
    'keywords' => '',
    'creator' => 'Laravel Pdf',
    'display_mode' => 'fullpage',
    'tempDir' => storage_path('tmp'),
    'font_path' => base_path('public/fonts'),
    'font_data' => [
        'alexbrush' => [
            'R' => 'AlexBrush-Regular.ttf',
        ],
        'sunflower' => [
            'R' => 'Sunflower-Light.ttf',
        ],
        'sanserif' => [
            'R' => 'san-serif.ttf',
        ],

        'abel' => [
            'R' => 'Abel-Regular.ttf',
        ],
    ],
];
