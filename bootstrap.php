<?php

use Core\AppContainer;
use Core\Container;
use Core\Database;

$container = new Container;
AppContainer::setContainer($container);

AppContainer::bind(Database::class, function () {
    $config = require(base_path('config.php'));
    return new Database($config['database'], $config['user'], $config['password']);
});



$db = AppContainer::resolve(Database::class);

dd($db->fetchAllUser()->fetchAll());
