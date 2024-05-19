<?php

use Core\Database;

$config = require(base_path('config.php'));

$db = new Database($config['database'], $config['user'], $config['password']);

$currentUserId = 6;

$posts = $db->fetchAllPostByUserId($currentUserId)->fetchAllOrFail();
$user = $db->fetchUser($currentUserId)->fetchOrFail();

$heading = 'Posts';

require base_path("views/posts/index.view.php");
