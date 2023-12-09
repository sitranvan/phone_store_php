<?php

namespace App\Middlewares;

use App\Classes\Login;
use App\Core\Middlewares;
use App\Core\Response;


class AuthMiddleware extends Middlewares
{

    public function handle()
    {

        // Với các router phải đăng nhập mới xem được thì quay về trang đăng nhập
        $login = new Login();

        if (!$login->isLogin()) {
            Response::redirect('dang-nhap');
        }
    }
}
