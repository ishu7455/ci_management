<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/', 'Auth::login');

$routes->get('/register', 'Auth::register');

$routes->post('/save-register', 'Auth::saveRegister');

$routes->get('/login', 'Auth::login');

$routes->post('/login-check', 'Auth::loginCheck');

$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Task::dashboard');

$routes->get('/tasks', 'Task::getTasks');

$routes->post('/task/store', 'Task::store');

$routes->get('/task/edit/(:num)', 'Task::edit/$1');

$routes->post('/task/update/(:num)', 'Task::update/$1');

$routes->delete('/task/delete/(:num)', 'Task::delete/$1');
