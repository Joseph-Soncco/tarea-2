<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas para mangas
$routes->get('mangas', 'MangaController::index');
$routes->get('mangas/crear', 'MangaController::crear');
$routes->post('mangas/guardar', 'MangaController::guardar');
$routes->get('mangas/editar/(:num)', 'MangaController::editar/$1');
$routes->post('mangas/actualizar/(:num)', 'MangaController::actualizar/$1');
$routes->get('mangas/eliminar/(:num)', 'MangaController::eliminar/$1');

// Reportes
$routes->get('reportes', 'ReportesController::index');
$routes->post('reportes/generar', 'ReportesController::generarReporte');
$routes->get('reportes/generos', 'ReportesController::obtenerGeneros');
