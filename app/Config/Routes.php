<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Front::index');

$routes->get('/beranda', 'Beranda::index');

$routes->get('/pelamar', 'Pelamar::index');
$routes->delete('/pelamar/(:any)', 'Pelamar::delete/$1');
$routes->get('/pelamar/detail/(:any)', 'Pelamar::detail/$1');
$routes->get('/pelamar/pelamardetail/(:any)', 'Pelamar::pelamardetail/$1');
$routes->get('/pelamar/prosessoal/(:any)', 'Pelamar::prosessoal/$1');
$routes->get('/pelamar/report', 'Pelamar::report');

$routes->get('/klien', 'Klien::index');
$routes->get('/kliengrid', 'Kliengrid::index');
$routes->get('/kliengrid/jqgrid_user', 'Kliengrid::jqgrid_user');
$routes->get('/klien/create', 'Klien::create');
$routes->delete('/klien/(:any)', 'Klien::delete/$1');
$routes->get('/klien/edit/(:any)', 'Klien::edit/$1');

$routes->get('/posisi', 'Posisi::index');
$routes->delete('/posisi/(:any)', 'Posisi::delete/$1');
$routes->get('/posisi/edit/(:any)', 'Posisi::edit/$1');

$routes->get('/jadwaltest', 'Jadwaltest::index');
$routes->get('/jadwaltest/create', 'Jadwaltest::create');
$routes->delete('/jadwaltest/(:any)', 'Jadwaltest::delete/$1');
$routes->get('/jadwaltest/edit/(:any)', 'Jadwaltest::edit/$1');

$routes->get('/soal', 'Soal::index');
$routes->delete('/soal/(:any)', 'Soal::delete/$1');
$routes->get('/soal/edit/(:any)', 'Soal::edit/$1');

$routes->get('/user', 'User::index');
$routes->delete('/user/(:any)', 'User::delete/$1');
$routes->get('/user/edit/(:any)', 'User::edit/$1');
$routes->get('/user/login', 'User::login');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
