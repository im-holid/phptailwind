<?php

use Core\AppContainer;
use Core\Database;

$db = AppContainer::resolve(Database::class);

$users = $db->fetchAllUser()->fetchAllOrFail();

view('views/posts/create.view.php', ['heading' => 'Post Create', 'errors' => [], 'users' => $users]);
