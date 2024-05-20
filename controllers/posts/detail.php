<?php

use Core\AppContainer;
use Core\ConstantClass;
use Core\Database;
use Core\Response;

$heading = 'Post';
$currentUserId = ConstantClass::$currentUserId;
$db = AppContainer::resolve(Database::class);

$id = $_GET['id'];

$user = $db->fetchUser($currentUserId)->fetchOrFail();
$post = $db->fetchPostById($id)->fetchOrFail();

check($post['user_id'] !== $user['id'], Response::FORBIDDEN);

view('views/posts/detail.view.php', ['heading' => 'Post', 'user' => $user, 'post' => $post]);
