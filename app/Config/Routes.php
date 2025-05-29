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
$routes->post('/enviarlogin','Login_controller::auth');
$routes->get('/panel', 'Panel_controller::index',['filter'=>'auth']);
$routes->get('/logout', 'Login_controller::logout');

?>