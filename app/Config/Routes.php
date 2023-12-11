<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Auth::auth');
$routes->get('/alumni', 'User::index');

// $routes->add('Admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/users', 'Admin::users', ['filter' => 'role:admin']);
