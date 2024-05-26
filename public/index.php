<?php

session_start();

use Core\AppContainer;
use Core\Container;
use Core\Database;
use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/function.php';

spl_autoload_register(function ($class) {
    $value = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path($value . '.php');
});

// require base_path('bootstrap.php');

$container = new Container;
AppContainer::setContainer($container);

AppContainer::bind(Database::class, function () {
    $config = require(base_path('config.php'));
    return new Database($config['database'], $config['user'], $config['password']);
});

$router =  new Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// dd($router);

$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
