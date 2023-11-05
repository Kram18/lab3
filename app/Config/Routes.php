<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mark', 'ProductController::mark');
$routes->get('/about', 'ProductController::about');
$routes->get('/contact', 'ProductController::contact');
$routes->get('/coffees', 'ProductController::coffees');
$routes->get('/blog', 'ProductController::blog');
$routes->get('/register', 'UserController::register');
$routes->get('/signup', 'UserController::signUp');
$routes->get('/signin', 'UserController::signIn');
