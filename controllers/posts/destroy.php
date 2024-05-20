<?php

use Core\AppContainer;
use Core\Database;
use Core\Response;

$db = AppContainer::resolve(Database::class);

$currentUserId = 6;

$id = $_POST['id'];

$user = $db->fetchUser($currentUserId)->fetchOrFail();
$post = $db->fetchPostById($id)->fetchOrFail();

check($post['user_id'] !== $user['id'], Response::FORBIDDEN);

$db->deletePost($id);

header('location:/posts');

exit();
