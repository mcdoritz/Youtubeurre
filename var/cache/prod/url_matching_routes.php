<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/archivedIndex' => [[['_route' => 'index.archived', '_controller' => 'App\\Controller\\ArchivedIndexController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/mediaList/(\\d+)(*:23)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        23 => [
            [['_route' => 'show.mediaList', '_controller' => 'App\\Controller\\MediaListController::show'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
