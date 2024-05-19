<?php

use Core\Database;
use Core\Validator;


$config = require(base_path('config.php'));

$db = new Database($config['database'], $config['user'], $config['password']);

$users = $db->fetchAllUser()->fetchAllOrFail();

$heading = 'Post Create';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    if (Validator::string($_POST['body'], 10, 1000)) $errors['body'] = 'body field is required with max 1000';

    if (Validator::string($_POST['title'], 10)) $errors['title'] = 'title field is required with minimum 10 characters';


    if (empty($errors)) $db->createPost($_POST['userId'], $_POST['body'], $_POST['title']);
}

require base_path("views/posts/create.view.php");
