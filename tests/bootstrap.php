<?php

// bootstrap will make all classes even from plugins available for testing

// NOTE: same as /public/index.php but...
// -> and realpath
// -> no "echo"

include realpath(__DIR__ . '/../') . '/vendor/autoload.php';

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

// echo $kirby->render();
