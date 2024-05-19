<?php

use Core\Response;

$routes = require base_path('routes.php');



function startPhp($data)
{
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    if (array_key_exists($uri, $data)) {

        require $data[$uri];
        return;
    }




    abort(Response::NOT_FOUND);
}

function abort($code)
{
    $heading = $code === Response::NOT_FOUND ? 'Not Found' : 'UNAUTHORIZED';
    http_response_code($code);
    require base_path("./views/$code.php");
    die();
}

startPhp($routes);
