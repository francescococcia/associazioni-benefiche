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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//Admin routes
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
  $routes->get('dashboard', 'Home::index', ['filter' => 'authGuard']);
  $routes->get('users', 'UsersController::index', ['filter' => 'authGuard']);
  $routes->post('users/delete/(:num)', 'UsersController::delete/$1', ['filter' => 'authGuard']);
  $routes->get('events', 'EventsController::index', ['filter' => 'authGuard']);
  $routes->post('events/delete/(:num)', 'EventsController::delete/$1', ['filter' => 'authGuard']);
  $routes->get('reports', 'ReportsController::index', ['filter' => 'authGuard']);
});

$routes->get('/', 'Home::index');
$routes->get('/signup-association', 'SignupAssociationController::index');
$routes->match(['get', 'post'], 'SignupAssociationController/store', 'SignupAssociationController::store');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authGuard']);

// Reports routes
$routes->get('/reports/create', 'ReportsController::create');
$routes->post('/reports/store', 'ReportsController::store');

// Feedback routes
$routes->get('/feedbacks/create', 'FeedbacksController::create', ['filter' => 'authGuard']);
$routes->post('/feedbacks/store/(:num)', 'FeedbacksController::store/$1', ['filter' => 'authGuard']);

// Events routes
$routes->get('/events', 'EventsController::index', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'EventsController/create', 'EventsController::create',['filter' => 'authGuard']);
$routes->get('events/new', 'EventsController::new', ['filter' => 'authGuard']);
$routes->get('events/detail/(:segment)', 'EventsController::show/$1', ['filter' => 'authGuard']);
$routes->get('/events/search', 'EventsController::search');
$routes->get('/events/results', 'EventsController::results');

// Participants routes
$routes->match(['get', 'post'], 'ParticipantsController/create', 'ParticipantsController::create', ['filter' => 'authGuard']);

// Products routes
$routes->get('/store', 'ProductsController::index', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'ProductsController/create', 'ProductsController::create', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'ProductsController/buy', 'ProductsController::buy', ['filter' => 'authGuard']);
$routes->get('store/new', 'ProductsController::new', ['filter' => 'authGuard']);
$routes->get('product/detail/(:segment)', 'ProductsController::show/$1', ['filter' => 'authGuard']);
$routes->get('cash-desk', 'ProductsController::cashDesk');
// $routes->get('store', 'ProductsController::index');
// $routes->get('store/create', 'ProductsController::create');
// $routes->post('store/store', 'ProductsController::store');
// $routes->get('store/edit/(:num)', 'ProductsController::edit/$1');
// $routes->post('store/update/(:num)', 'ProductsController::update/$1');
// $routes->get('store/delete/(:num)', 'ProductsController::delete/$1');

// Partecipants routes
$routes->post('participants/create', 'ParticipantsController::create', ['filter' => 'authGuard']);

// Users routes
$routes->get('/profile', 'UsersController::edit', ['filter' => 'authGuard']);
$routes->post('/users/update', 'UsersController::update', ['filter' => 'authGuard']);
$routes->add('forgot-password', 'UsersController::forgotPassword');
$routes->match(['get', 'post'], 'UsersController/sendForgotPassword', 'UsersController::sendForgotPassword');

// Association routes
$routes->get('/profile-manager', 'AssociationsController::edit', ['filter' => 'authGuard']);
$routes->post('/associations/update', 'AssociationsController::update', ['filter' => 'authGuard']);
$routes->get('/associations/create', 'AssociationsController::create');
$routes->post('/associations/store', 'AssociationsController::store');

$routes->get('/logout', 'Home::exit');
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
