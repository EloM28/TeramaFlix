<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('readController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->post('read/search', 'readController::search');
$routes->post('upload/add', 'UploadController::add');
$routes->get('post/fetch', 'PostController::fetch');
$routes->get('/Watch', 'readController::play');
$routes->post('read/play', 'readController::playVideo');
$routes->post('post/comment', 'readController::comment');
$routes->post('post/liked', 'readController::liked');
$routes->post('read/list', 'readController::list');
$routes->get('/Upload', 'PostController::post');
$routes->post('/Upload/Video', 'UploadController::upvideo');
$routes->post('post/add', 'PostController::add');
$routes->get('post/edit/(:num)', 'PostController::edit/$1');
$routes->get('post/delete/(:num)', 'PostController::elete/$1');
$routes->get('post/detail/(:num)', 'PostController::detail/$1');
$routes->post('post/update', 'PostController::update');
$routes->post('post/search', 'PostController::search');
$routes->post('post/searched', 'PostController::searched');
$routes->post('login', 'Home::Login');
$routes->post('SignUp', 'Home::Register');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
