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

/*Rutas para el login*/
$routes->get('/login', 'Home::login');
$routes->post('/enviarlogin','LoginController::auth');
$routes->get('/panel', '$::index',['filter'=>'auth']);
$routes->get('/logout', 'LoginController::logout');
$routes->get('/Register', 'RegisterController::login');
?>