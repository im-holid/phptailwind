<?php

use Core\Database;
use Core\Response;

$config = require(base_path('config.php'));

$heading = 'Post';
$currentUserId = 6;
$db = new Database($config['database'], $config['user'], $config['password']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $user = $db->fetchUser($currentUserId)->fetchOrFail();
    $post = $db->fetchPostById($id)->fetchOrFail();
    check($post['user_id'] !== $user['id'], Response::FORBIDDEN);
    $db->deletePost($_POST['id']);
    header('location:/posts');
    return;
}

$id = $_GET['id'];


$user = $db->fetchUser($currentUserId)->fetchOrFail();
$post = $db->fetchPostById($id)->fetchOrFail();

check($post['user_id'] !== $user['id'], Response::FORBIDDEN);

require base_path("views/posts/detail.view.php");
