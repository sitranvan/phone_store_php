<?php
$routes = [
    // Admin route
    _ADMIN => [
        'admin' => 'admin/DashboardController',

        'admin/nguoi-dung' => 'admin/users/ListUserController',
        'admin/vo-hieu-hoa-nguoi-dung/(.+)' => 'admin/users/DisableUserController/index/$1',
        'admin/xoa-tai-khoan-nguoi-dung/(.+)' => 'admin/users/DeleteUserController/index/$1',

        'admin/san-pham' => 'admin/products/ListProductController',
        'admin/them-san-pham' => 'admin/products/CreateProductController',
        'admin/submit-add-product' => 'admin/products/CreateProductController/createProduct',
        'admin/sua-san-pham/(.+)' => 'admin/products/EditProductController/index/$1',
        'admin/submit-edit-product' => 'admin/products/EditProductController/updateProduct',
        'admin/xoa-san-pham/(.+)' => 'admin/products/DeleteProductController/index/$1',

        'admin/danh-muc' => 'admin/categories/ListCategoryController',
        'admin/them-danh-muc' => 'admin/categories/CreateCategoryController',
        'admin/submit-add-category' => 'admin/categories/CreateCategoryController/createCategory',
        'admin/sua-danh-muc/(.+)' => 'admin/categories/EditCategoryController/index/$1',
        'admin/submit-edit-category' => 'admin/categories/EditCategoryController/updateCategory',
        'admin/xoa-danh-muc/(.+)' => 'admin/categories/DeleteCategoryController/index/$1',

        'admin/thuong-hieu' => 'admin/brands/ListBrandController',
        'admin/them-thuong-hieu' => 'admin/brands/CreateBrandController',
        'admin/submit-add-brand' => 'admin/brands/CreateBrandController/createBrand',
        'admin/sua-thuong-hieu/(.+)' => 'admin/brands/EditBrandController/index/$1',
        'admin/submit-edit-brand' => 'admin/brands/EditBrandController/updateBrand',
        'admin/xoa-thuong-hieu/(.+)' => 'admin/brands/DeleteBrandController/index/$1',
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
        'chi-tiet/(.+)' => 'clients/products/ProductDetailController/index/$1',

        'gio-hang' => 'clients/carts/ListCartController',

        'them-gio-hang/(.+)' => 'clients/carts/AddToCartController/index/$1',
        'cap-nhat-so-luong' => 'clients/carts/UpdateQuantityController',
        'xoa-san-pham-trong-gio-hang/(.+)' => 'clients/carts/DeleteProductInCartController/index/$1',
        'thong-tin-ca-nhan' => 'clients/users/UpdateProfileController',
        'submit-update-profile' => 'clients/users/UpdateProfileController/updateProfile',
        'tao-don-hang' => 'clients/orders/CreateOrderController',
        'submit-create-order' => 'clients/orders/CreateOrderController/createOrder',

        'don-hang-cua-toi' => 'clients/orders/MyOrderController',
        'huy-don-hang' => 'clients/orders/CancelOrderController',
        'chi-tiet-don-hang/(.+)' => 'clients/orders/DetailOrderController/index/$1'
    ]
];
