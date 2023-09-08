<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/register', 'Home::register');
$routes->match(['get', 'post'], '/login', 'Home::login');
$routes->get('logout', 'Home::logout');
$routes->match(['get', 'post'], '/productos', 'Productos::index');
$routes->match(['get', 'post'], '/productos/add', 'Productos::add');
$routes->match(['get', 'post'], '/productos/view/(:num)', 'Productos::view/$1');
$routes->match(['get', 'post'], '/productos/edit/(:num)', 'Productos::edit/$1');
$routes->match(['get', 'post'], '/productos/delete/(:num)', 'Productos::delete/$1');
$routes->match(['get', 'post'], '/comentarios', 'Comentarios::index');
$routes->match(['get', 'post'], '/comentarios/add', 'Comentarios::add');
$routes->match(['get', 'post'], '/comentarios/edit/(:num)', 'Comentarios::edit/$1');
$routes->match(['get', 'post'], '/comentarios/delete/(:num)', 'Comentarios::delete/$1');
