<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('test-db', 'Home::testDB');
$routes->get('/', 'Home::inicio');
$routes->get('quienesSomos', 'Home::quienes');
$routes->get('contactos', 'Home::contacto');
$routes->get('index', 'Home::inicio');
$routes->get('terminos', 'Home::termino');
$routes->get('comercializacion', 'Home::comercializaciones');
$routes->get('contacto', 'Home::contacto');

// ??? $routes->get('iniciarSesion', 'Home::sesiones');
$routes->get('register', 'Home::registro');

$routes->post('consultas/guardar', 'ConsultaController::guardar');
$routes->get('contacto', 'ConsultaController::index'); // posiblemente borrar

// Rutas para el login y panel
$routes->get('login', 'login_controller::index');
$routes->post('enviarLogin', 'login_controller::auth');
$routes->get('panel', 'login_controller::index', ['filter' => 'auth']);
$routes->get('logout', 'login_controller::logout');

// Rutas para el registro
$routes->get('registro', 'usuario_controller::create');
$routes->post('enviar-form', 'usuario_controller::formValidation');



$routes->group("cliente", ["filter" => "Autenticacion_Cliente"], function ($routes) {
    $routes->post('ventas-ad', 'VentasAdminController::guardarVenta');
});

$routes->get('/productos', 'ProductoController::index');

$routes->get('compras-usuario', 'VentasAdminController::indexUser');
$routes->get('ventas-exito', 'VentasAdminController::compraRealizada');


$routes->group("administrador", ["filter" => "Autenticacion"], function ($routes) {
    // Rutas para ABM de usuarios   
    $routes->get('usuarios', 'UsuariosController::index');
    $routes->get('usuarios/create', 'UsuariosController::create');
    $routes->post('usuarios/store', 'UsuariosController::store');
    $routes->get('usuarios/edit/(:num)', 'UsuariosController::edit/$1');
    $routes->post('usuarios/update/(:num)', 'UsuariosController::update/$1');
    $routes->get('usuarios/delete/(:num)', 'UsuariosController::delete/$1');
    $routes->get('usuarios/baja', 'UsuariosController::baja');
    $routes->get('usuarios/alta/(:num)', 'UsuariosController::alta/$1');

    // Rutas para productos
    $routes->get('productos', 'ProductoController::index');
    $routes->get('productos/admin', 'ProductoController::admin');
    $routes->get('productos/crear', 'ProductoController::crear');
    $routes->post('productos/guardar', 'ProductoController::guardar');
    $routes->get('productos/editar/(:num)', 'ProductoController::editar/$1');
    $routes->post('productos/actualizar', 'ProductoController::actualizar');
    $routes->get('productos/eliminar/(:num)', 'ProductoController::eliminar/$1');
    $routes->get('productos/eliminados', 'ProductoController::mostrarEliminados');
    $routes->get('productos/restaurar/(:num)', 'ProductoController::restaurar/$1');

    // Rutas para consultas
    $routes->get('contacto/formulario', 'ConsultaController::formulario');
    $routes->get('consultas/ver/(:num)', 'ConsultaController::ver/$1');
    $routes->get('consultas/eliminar/(:num)', 'ConsultaController::eliminar/$1');
    $routes->get('consultas/filtrar', 'ConsultaController::filtrar');

    $routes->get('ventas-admin', 'VentasAdminController::index');
});

?>