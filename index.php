<?php
require_once 'loader.php';
$request = $_REQUEST['q'];

$requests = explode('/', $request);

$first = $requests[0];

$routes = [
    '' => 'templates/translate.php',
    'translate' => 'templates/translate.php',
];

if (isset($routes[$first])) {
    require_once $routes[$first];
} else {
    header('location:translate');
}


