<?php

use Core\Database;
use Core\AppContainer;
use Core\ConstantClass;
use Core\Response;

$errors = [];
$currentUserId = ConstantClass::$currentUserId;
$db = AppContainer::resolve(Database::class);

$id = $_GET['id'];

$user = $db->fetchUser($currentUserId)->fetchOrFail();
$post = $db->fetchPostById($id)->fetchOrFail();

check($post['user_id'] !== $user['id'], Response::FORBIDDEN);

view('views/posts/edit.view.php', ['heading' => 'Post Edit', 'errors' => [], 'user' => $user, 'post' => $post]);
