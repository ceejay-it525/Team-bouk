<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth', 'Auth::auth');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/logout', 'Auth::logout');

$routes->get('/', 'Dashboard::index');

$routes->get('products', 'Products::index');
$routes->post('products/save', 'Products::save');
$routes->post('products/getAll', 'Products::getAll');

$routes->get('categories', 'Categories::index');
$routes->post('categories/save', 'Categories::save');
$routes->post('categories/getAll', 'Categories::getAll');

$routes->get('suppliers', 'Suppliers::index');
$routes->post('suppliers/save', 'Suppliers::save');
$routes->post('suppliers/getAll', 'Suppliers::getAll');
   
// ========== USERS (Keep Existing) ==========
    $routes->get('/users', 'Users::index');
    $routes->post('users/save', 'Users::save');
    $routes->get('users/edit/(:segment)', 'Users::edit/$1');
    $routes->post('users/update', 'Users::update');
    $routes->delete('users/delete/(:num)', 'Users::delete/$1');
    $routes->post('users/fetchRecords', 'Users::fetchRecords');

