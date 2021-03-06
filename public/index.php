<?php

include '../vendor/autoload.php';

$kirby = new Kirby([
    'roots' => [
        'index'    => __DIR__,
        'media'    => __DIR__ . '/media',
        'base'     => $base    = dirname(__DIR__),
        'site'     => $base . '/site',
        'storage'  => $storage = $base . '/storage',
        'content'  => $base . '/content',
        'accounts' => $storage . '/accounts',
        'cache'    => $storage . '/cache',
        'sessions' => $storage . '/sessions',
    ]
]);

echo $kirby->render();
