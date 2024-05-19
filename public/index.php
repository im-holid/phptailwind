<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/function.php';

spl_autoload_register(function ($class) {
    $value = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path($value . '.php');
});

require base_path('Core/router.php');
