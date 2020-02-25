<?php

use Kirby\Cms\Response;

load([
    'Example\\Database' => __DIR__ . '/classes/Example/Database.php',
    'DatabasePage' => __DIR__ . '/models/DatabasePage.php',
]);

Kirby::plugin('example/example', [
    'blueprints' => [
        'pages/database' => __DIR__ . '/blueprints/database.yml'
    ],
    'pageModels' => [
        'database' => 'DatabasePage',
    ],
    'templates' => [
        'database' => __DIR__ . '/templates/database.php',
    ],
    'routes' => [
        [
            'pattern' => 'example/db/(:any)',
            'action' => function ($slug) {
                /** @var \Kirby\Toolkit\Obj $obj */
                $obj = (new \Example\Database())->query($slug);
                $data = $obj ? $obj->toArray() : [];

                return Response::json(
                    $data,
                    count($data) ? 200 : 400
                );
            }
        ],
    ],
]);
