<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->resource('todos', '');

// $routes->get('/todos', 'TodoController::index', ['name' => 'index']);
// $routes->get('/todos/(:num)', 'TodoController::show/$1', ['name' => 'show']);
// $routes->post('/todos', 'TodoController::store', ['name' => 'store']);
// $routes->put('/todos/(:num)', 'TodoController::update/$1', ['name' => 'update']);
// $routes->delete('/todos/(:num)', 'TodoController::delete/$1', ['name' => 'delete']);