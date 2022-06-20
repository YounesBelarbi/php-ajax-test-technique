<?php

require 'vendor/autoload.php';

$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__ . '/.env');

require 'src/Controllers/MainController.php';

$router = new AltoRouter;

$router->map('GET', '/', ['controller' => 'App\Controllers\MainController', 'method' => 'index'], 'home');
$router->map('GET', '/api/filter', ['controller' => 'App\Controllers\ApiController', 'method' => 'filter'], 'api_filter');
$router->map('POST', '/api/delete', ['controller' => 'App\Controllers\ApiController', 'method' => 'delete'], 'api_delete');


$match = $router->match();



if (!$match) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
    exit('On a rien trouvé !');
} else {
    $controller = $match['target']['controller'];
    $methodToCall = $match['target']['method'];
    $controller = new $controller();
    $controller->$methodToCall();
}
