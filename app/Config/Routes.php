<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BlogController::HomeIndex');
$routes->get('/about', 'BlogController::AboutIndex');
$routes->get("/featured_blog/(:num)", "BlogController::HomeDetail/$1");
$routes->get('/blogs', 'BlogController::BlogIndex');
$routes->get("/blogs/(:num)", "BlogController::BlogDetail/$1");
$routes->post("comment/create", "BlogController::create");

service('auth')->routes($routes);
