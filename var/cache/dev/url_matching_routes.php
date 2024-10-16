<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/recipes' => [[['_route' => 'app_api_all_recipes', '_controller' => 'App\\Controller\\Api\\RecipeController::index'], null, null, null, false, false, null]],
        '/api/recipe/recent' => [[['_route' => 'app_api_recent_recipes', '_controller' => 'App\\Controller\\Api\\RecipeController::recent'], null, null, null, false, false, null]],
        '/api/recipe/admin/new' => [[['_route' => 'app_api_new_recipes', '_controller' => 'App\\Controller\\Api\\RecipeController::new'], null, null, null, false, false, null]],
        '/api/recipe/admin/update' => [[['_route' => 'app_api_update_recipes', '_controller' => 'App\\Controller\\Api\\RecipeController::update'], null, null, null, false, false, null]],
        '/api/recipe/categories' => [[['_route' => 'app_api_categories', '_controller' => 'App\\Controller\\Api\\RecipeController::categories'], null, null, null, false, false, null]],
        '/api/recipe/types' => [[['_route' => 'app_api_types', '_controller' => 'App\\Controller\\Api\\RecipeController::types'], null, null, null, false, false, null]],
        '/api/login' => [[['_route' => 'api_security_login', '_controller' => 'App\\Controller\\Api\\SecurityController::login'], null, ['POST' => 0], null, false, false, null]],
        '/api/register' => [[['_route' => 'api_security_register', '_controller' => 'App\\Controller\\Api\\SecurityController::register'], null, ['POST' => 0], null, false, false, null]],
        '/api/upVote' => [[['_route' => 'app_api_upVote_recipes', '_controller' => 'App\\Controller\\Api\\UpVoteController::upVote'], null, null, null, false, false, null]],
        '/api/removeUpVote' => [[['_route' => 'app_api_removeUpVote_recipes', '_controller' => 'App\\Controller\\Api\\UpVoteController::removeUpVote'], null, null, null, false, false, null]],
        '/api/isUpVotedByUser' => [[['_route' => 'app_api_isUpVotedByUser_recipes', '_controller' => 'App\\Controller\\Api\\UpVoteController::isUpVotedByUser'], null, null, null, false, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/recipe/([^/]++)(*:62)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        62 => [
            [['_route' => 'app_api_specific_recipe', '_controller' => 'App\\Controller\\Api\\RecipeController::specific'], ['title'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
