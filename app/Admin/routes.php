<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('link', LinkController::class);

    $router->resource('key', KeyController::class);

    $router->resource('document', DocumentController::class);

    $router->resource('album', AlbumController::class);

    $router->resource('profile', ProfileController::class);

    $router->resource('photo', PhotoController::class);

    $router->resource('category', CategoryController::class);
});
