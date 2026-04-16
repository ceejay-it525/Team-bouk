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

$routes->get('/products', 'Products::index');
$routes->get('/products/create', 'Products::create');
$routes->post('/products/store', 'Products::store');
$routes->get('/products/edit/(:num)', 'Products::edit/$1');
$routes->post('/products/update/(:num)', 'Products::update/$1');
$routes->get('/products/delete/(:num)', 'Products::delete/$1');

/* =========================
   CATEGORIES
========================= */
$routes->get('categories', 'Categories::index');
$routes->post('categories/save', 'Categories::save');
$routes->post('categories/getAll', 'Categories::getAll');

/* =========================
   SUPPLIERS
========================= */
$routes->get('suppliers', 'Suppliers::index');
$routes->post('suppliers/save', 'Suppliers::save');
$routes->post('suppliers/getAll', 'Suppliers::getAll');

/* =========================
   PURCHASE ORDERS
========================= */
$routes->get('purchases', 'PurchaseOrders::index');
$routes->post('purchases/save', 'PurchaseOrders::save');
$routes->post('purchases/update', 'PurchaseOrders::update');
$routes->get('purchases/edit/(:num)', 'PurchaseOrders::edit/$1');
$routes->get('purchases/delete/(:num)', 'PurchaseOrders::delete/$1');

/* =========================
   SALES
========================= */
$routes->get('sales', 'Sales::index');
$routes->post('sales/save', 'Sales::save');
$routes->post('sales/update', 'Sales::update');
$routes->get('sales/edit/(:num)', 'Sales::edit/$1');
$routes->get('sales/delete/(:num)', 'Sales::delete/$1');

/* =========================
   INVENTORY
========================= */
$routes->get('inventory', 'Inventory::index');

/* =========================
   USERS
========================= */
$routes->get('/users', 'Users::index');
$routes->post('users/save', 'Users::save');
$routes->get('users/edit/(:segment)', 'Users::edit/$1');
$routes->post('users/update', 'Users::update');
$routes->delete('users/delete/(:num)', 'Users::delete/$1');
$routes->post('users/fetchRecords', 'Users::fetchRecords');

/* =========================
   LOGS
========================= */
$routes->get('/log', 'Logs::log');