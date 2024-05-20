<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/posts', 'controllers/posts/index.php');
$router->get('/post', 'controllers/posts/detail.php');
$router->get('/post-create', 'controllers/posts/create.php');
$router->get('/post-edit', 'controllers/posts/edit.php');
$router->post('/posts', 'controllers/posts/store.php');
$router->update('/posts', 'controllers/posts/update.php');
$router->delete('/post', 'controllers/posts/destroy.php');
