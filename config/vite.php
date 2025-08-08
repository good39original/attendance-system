<?php

return [
    'input' => [
        'resources/css/app.css',
        'resources/js/app.js',
    ],

    // 本番環境のURL（envで設定したAPP_URLを使う想定）
    'build_path' => env('APP_URL') . '/build',
];
