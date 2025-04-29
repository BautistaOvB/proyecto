<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::inicio');
$routes->get('quienesSomos', 'Home::quienes');
$routes->get('contactos', 'Home::contacto');
$routes->get('index', 'Home::inicio');
$routes->get('terminos', 'Home::termino');
$routes->get('comercializacion', 'Home::comercializaciones');
$routes->get('contacto', 'ConsultaController::index');

?>