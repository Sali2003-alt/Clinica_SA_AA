<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = service('routes');

$routes->get('/', 'Home::index');

$routes->get('cita_listar', 'Cita::listar');
$routes->get('cita_agregar', 'Cita::agregar');
$routes->post('cita_guardar', 'Cita::guardar');
$routes->get('cita_eliminar/(:num)', 'Cita::eliminar/$1');
$routes->get('cita_editar/(:num)', 'Cita::editar/$1');
$routes->post('cita_actualizar/(:num)', 'Cita::actualizar/$1');

// Rutas para Tratamiento
$routes->get('tratamiento_listar', 'Tratamiento::listar');
$routes->get('tratamiento_agregar', 'Tratamiento::agregar');
$routes->post('tratamiento_guardar', 'Tratamiento::guardar');
$routes->get('tratamiento_eliminar/(:num)', 'Tratamiento::eliminar/$1');
$routes->get('tratamiento_editar/(:num)', 'Tratamiento::editar/$1');
$routes->post('tratamiento_actualizar/(:num)', 'Tratamiento::actualizar/$1');

// Rutas para Historial Clinico
$routes->get('historial_listar', 'HistorialClinico::listar');
$routes->get('historial_agregar', 'HistorialClinico::agregar');
$routes->post('historial_guardar', 'HistorialClinico::guardar');
$routes->get('historial_eliminar/(:num)', 'HistorialClinico::eliminar/$1');
$routes->get('historial_editar/(:num)', 'HistorialClinico::editar/$1');
$routes->post('historial_actualizar/(:num)', 'HistorialClinico::actualizar/$1');

$routes->get('historialclinico_listar', 'HistorialClinico::listar');              
$routes->get('historialclinico_agregar', 'HistorialClinico::agregar');     
$routes->post('historialclinico_guardar', 'HistorialClinico::guardar');    
$routes->get('historialclinico_eliminar/(:num)', 'HistorialClinico::eliminar/$1'); 
$routes->get('historialclinico_editar/(:num)', 'HistorialClinico::editar/$1'); 
$routes->post('historialclinico_actualizar/(:num)', 'HistorialClinico::actualizar/$1'); 

$routes->get('paciente_listar', 'Paciente::listar');
$routes->get('paciente_agregar', 'Paciente::agregar');
$routes->post('paciente_guardar', 'Paciente::guardar');
$routes->get('paciente_eliminar/(:num)', 'Paciente::eliminar/$1');
$routes->get('paciente_editar/(:num)', 'Paciente::editar/$1');
$routes->post('paciente_actualizar/(:num)', 'Paciente::actualizar/$1');
// Dentista
$routes->get('dentista_listar', 'Dentista::listar');
$routes->get('dentista_agregar', 'Dentista::agregar');
$routes->post('dentista_guardar', 'Dentista::guardar');
$routes->get('dentista_eliminar/(:num)', 'Dentista::eliminar/$1');
$routes->get('dentista_editar/(:num)', 'Dentista::editar/$1');
$routes->post('dentista_actualizar/(:num)', 'Dentista::actualizar/$1');

$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('tempcontroller/insertarusuario', 'TempController::insertarUsuario');
