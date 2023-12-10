<?php
$routes = [
    // Admin route
    _ADMIN => [
        'admin' => 'admin/DashboardController',
        'admin/san-pham' => 'admin/products/ListProductController',
        'admin/them-san-pham' => 'admin/products/AddProductController',
        'admin/submit-add-product' => 'admin/products/CreateProductController/createProduct',
        'admin/sua-san-pham/(.+)' => 'admin/products/EditProductController/index/$1',
        'admin/submit-edit-product' => 'admin/products/EditProductController/updateProduct',
        'admin/xoa-san-pham/(.+)' => 'admin/products/DeleteProductController/index/$1',
    ],
    // Clients route
    _CLENTS => [
        '/' => 'clients/HomeController',
        'dang-ky' => 'clients/auth/RegisterController',
        'submit-register' => 'clients/auth/RegisterController/register',
        'xac-thuc' => 'clients/auth/VerifyController',
        'submit-verify' => 'clients/auth/VerifyController/verify',
        'resend' => 'clients/auth/VerifyController/resend',
        'dang-nhap' => 'clients/auth/LoginController',
        'submit-login' => 'clients/auth/LoginController/login',
        'dang-xuat' => 'clients/auth/LogoutController',
        'thay-doi-mat-khau' => 'clients/auth/ChangePasswordController',
        'submit-change-password' => 'clients/auth/ChangePasswordController/changePassword',
        'quen-mat-khau' => 'clients/auth/ForgotPasswordController',
        'submit-forgot-password' => 'clients/auth/ForgotPasswordController/forgotPassword',
        'khoi-phuc-mat-khau' => 'clients/auth/ResetPasswordController',
        'submit-reset-password' => 'clients/auth/ResetPasswordController/resetPassword',
        'gui-lai-yeu-cau-quen-mat-khau' => 'clients/auth/ResendForgotPasswordController',
        'submit-resend-forgot-password' => 'clients/auth/ResendForgotPasswordController/resendForgotPassword',
        'danh-muc' => 'clients/CategoryController',
        've-chung-toi' => 'clients/AboutController',
        'tin-moi-nhat' => 'clients/LatestNewsController',
        'lien-he' => 'clients/ContactController',
        'phan-tu' => 'clients/ElementController',
        'blog' => 'clients/BlogController',
        'chi-tiet' => 'clients/HomeController/detail',

    ]
];
