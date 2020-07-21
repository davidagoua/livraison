<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('zones', ZoneController::class);
    $router->resource('communes', CommuneController::class);
    $router->resource('livreurs', LivreurController::class);
    $router->resource('clients', ClientController::class);
    $router->resource('recepteurs', RecepteurController::class);
    $router->resource('livraisons', LivraisonController::class);

});
