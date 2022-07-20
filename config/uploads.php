<?php
return [
    'path_upload' => [
        'base' => 'public/uploads',
        'images' => 'public/uploads/images',
        'files' => 'public/uploads/files'
    ],

    'max_size' => env('MAX_SIZE', '1M')
];
