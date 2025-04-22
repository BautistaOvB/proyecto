<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/quienessomos', 'Home::quienesSomos');
$routes->get('/registro', 'Home::registro');
$routes->get('/ingreso', 'Home::ingreso');
$routes->post('/reservar', 'Home::reservar');
$routes->post('/cancelar', 'Home::cancelar');
$routes->post('/registro', 'Home::registro');
$routes->post('/ingreso', 'Home::ingreso');

