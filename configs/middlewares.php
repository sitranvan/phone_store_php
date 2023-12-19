<?php

use App\Middlewares\AdminMiddleware;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;



$guestRoutes = [
    'className' => GuestMiddleware::class,
    'routes' => [
        '/', 'dang-nhap', 'dang-ky', 'quen-mat-khau', 'chi-tiet/(.+)',  'them-vao-gio-hang/(.+)',
    ],
];

$authRoutes = [
    'className' => AuthMiddleware::class,
    'routes' => [
        'lien-he', 'thay-doi-mat-khau',

        'gio-hang'

    ],
];

$adminRoutes = [
    'className' => AdminMiddleware::class,
    'routes' => [
        'admin',
        'admin/san-pham',
        'admin/them-san-pham',
        'admin/submit-add-product',
        'admin/sua-san-pham/(.+)',
        'admin/submit-edit-product',
        'admin/xoa-san-pham/(.+)',
        'admin/danh-muc',
        'admin/sua-danh-muc/(.+)',
        'admin/submit-edit-category',
        'admin/xoa-danh-muc/(.+)',
        'admin/thuong-hieu',
        'admin/them-thuong-hieu',
        'admin/submit-add-brand',
        'admin/sua-thuong-hieu/(.+)',
        'admin/submit-edit-brand',
        'admin/xoa-thuong-hieu/(.+)'
    ],
];
