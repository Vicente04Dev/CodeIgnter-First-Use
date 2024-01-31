<?php

use App\Models\NewsModel;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('news/new', [News::class, 'new']);
$routes->post('news', [News::class, 'create']);
$routes->get('news/(:num)', [News::class, 'showById']);

$routes->get('news', [News::class, 'index']);
$routes->get('news/(:segment)', [News::class, 'show']);

$routes->view('about', 'pages/about');

$routes->get('nova', [NewsModel::class, 'testRender']);
