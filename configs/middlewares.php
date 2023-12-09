<?php

use App\Middlewares\AdminMiddleware;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;



$guestRoutes = [
    'className' => GuestMiddleware::class,
    'routes' => [
        '/', 'dang-nhap', 'dang-ky', 'quen-mat-khau', ''
    ],
];

$authRoutes = [
    'className' => AuthMiddleware::class,
    'routes' => [
        'lien-he', 'thay-doi-mat-khau'
    ],
];

$adminRoutes = [
    'className' => AdminMiddleware::class,
    'routes' => [
        'admin'
    ],
];
