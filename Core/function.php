<?php
function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo "</pre>";
    die();
};

function classNav($var)
{
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    if ($uri === $var) {
        echo 'bg-gray-900 text-white';
        return;
    }
    echo 'text-gray-300 hover:bg-gray-700 hover:text-white';
    return;
}

function abort($code = 404)
{
    $heading = $code === \Core\Response::NOT_FOUND ? 'Not Found' : 'UNAUTHORIZED';
    http_response_code($code);
    require base_path("./views/$code.php");
    die();
}

function check($condition, $status)
{
    if ($condition) abort($status);
    return;
}

function base_path($path)
{
    return BASE_PATH . $path;
}


function view($path, $attributes = [])
{
    extract($attributes);
    return require base_path($path);
}
