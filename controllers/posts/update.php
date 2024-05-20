<?php

use Core\Database;
use Core\Validator;
use Core\AppContainer;
use Core\ConstantClass;

$errors = [];

$currentUserId = ConstantClass::$currentUserId;
$db = AppContainer::resolve(Database::class);


if (Validator::string($_POST['id'], 1)) $errors['body'] = 'post id undefined';

if (Validator::string($_POST['body'], 10, 5000)) $errors['body'] = 'body field is required with max 1000';

if (Validator::string($_POST['title'], 10)) $errors['title'] = 'title field is required with minimum 10 characters';


if (!empty($errors)) {
    $post = [
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'body' => $_POST['body'],
    ];
    $user = $db->fetchUser($currentUserId)->fetchOrFail();
    view('views/posts/edit.view.php', ['heading' => 'Post Edit', 'errors' => $errors, 'user' => $user, 'post' => $post]);
}

$db->updatePost($_POST['id'], $_POST['body'], $_POST['title']);
header('location:/posts');
die();
