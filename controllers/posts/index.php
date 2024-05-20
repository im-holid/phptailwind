<?php

use Core\AppContainer;
use Core\Database;

$db = AppContainer::resolve(Database::class);

$currentUserId = 6;

$posts = $db->fetchAllPostByUserId($currentUserId)->fetchAllOrFail();
$user = $db->fetchUser($currentUserId)->fetchOrFail();

$heading = 'Posts';

view('views/posts/index.view.php', ['heading' => 'Post', 'user' => $user, 'posts' => $posts]);
