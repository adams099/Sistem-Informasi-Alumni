<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//  Public route
$routes->get('/', 'Auth::auth');
$routes->get('/alumni', 'User::index');
$routes->get('/profile', 'User::profile');

$routes->add('Admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->add('User', 'User::index', ['filter' => 'role:user']);
$routes->get('/user', 'Auth::auth', ['filter' => 'role:user']);
$routes->get('/admin', 'Auth::auth', ['filter' => 'role:admin']);

// admin route
$routes->get('/admin/users', 'Admin::users', ['filter' => 'role:admin']);
$routes->post('/admin/users/update', 'Admin::update', ['filter' => 'role:admin']);
$routes->get('/admin/approval', 'Admin::approval', ['filter' => 'role:admin']);
$routes->post('/admin/approval/update', 'Admin::approvalUpdate', ['filter' => 'role:admin']);
$routes->post('/alumni/delete', 'Admin::deleteAlumni', ['filter' => 'role:admin']);

// user route
$routes->get('/user/form', 'User::form', ['filter' => 'role:user']);
$routes->post('/user/save', 'User::save', ['filter' => 'role:user']);
$routes->post('/user/update', 'User::update', ['filter' => 'role:user']);
