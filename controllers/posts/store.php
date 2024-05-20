<?php

use Core\Database;
use Core\Validator;
use Core\AppContainer;

$errors = [];

$db = AppContainer::resolve(Database::class);

if (Validator::string($_POST['body'], 10, 5000)) $errors['body'] = 'body field is required with max 1000';

if (Validator::string($_POST['title'], 10)) $errors['title'] = 'title field is required with minimum 10 characters';


if (!empty($errors)) {
    $users = $db->fetchAllUser()->fetchAllOrFail();
    view('views/posts/create.view.php', ['heading' => 'Post Create', 'errors' => $errors, 'users' => $users]);
}

$db->createPost($_POST['userId'], $_POST['body'], $_POST['title']);
header('location:/posts');
die();
