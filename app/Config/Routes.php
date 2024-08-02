<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group("admin/barang", function ($routes) {
    $routes->get('/', 'admin\Barang::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "admin\Barang::tambah");
    // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});

$routes->group("admin/kategori", function ($routes) {
    $routes->get('/', 'admin\Kategori::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "admin\Kategori::tambah");
    // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});
