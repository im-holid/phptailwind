<?php

return $routes = [
    '/' => base_path('controllers/index.php'),

    '/about' => base_path('controllers/about.php'),

    '/contact' => base_path('controllers/contact.php'),

    '/posts' => base_path('controllers/posts/index.php'),

    '/post' => base_path('controllers/posts/detail.php'),

    '/post-create' => base_path('controllers/posts/create.php'),
];
