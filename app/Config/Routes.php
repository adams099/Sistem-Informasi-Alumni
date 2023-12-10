<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'User::index');
$routes->get('/alumni', 'User::alumni');

$routes->add('Admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/users', 'Admin::users', ['filter' => 'role:admin']);
