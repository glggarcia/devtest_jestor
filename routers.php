<?php
global $routes;
$routes = array();

$routes['auth/logout'] = 'auth/logout';

$routes['/auth/login'] = '/auth/index';
$routes['/auth/signin'] = '/auth/signIn';
$routes['/auth/register'] = '/auth/register';
$routes['/auth/checklogin'] = '/auth/checkLogin';


$routes['/ticket/create']      = '/ticket/create';
$routes['/ticket/store']       = '/ticket/store';
$routes['/ticket/edit/{id}']   = '/ticket/edit/:id';
$routes['/ticket/delete/{id}'] = '/ticket/delete/:id';

