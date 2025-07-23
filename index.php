<?php
require_once 'loader.php';
$request = $_REQUEST['q'];

$requests = explode('/', $request);

$first = $requests[0];

$routes = [
    '' => 'templates/register.php',
    'register' => 'templates/register.php',
    'login' => 'templates/login.php',
    'translate' => 'templates/translate.php',
    'logout' => 'templates/logout.php'
];

if (isset($routes[$first])) {
    require_once $routes[$first];
} else {
    header('location:translate');
}


