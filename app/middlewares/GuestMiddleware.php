<?php

namespace App\Middlewares;

use App\Classes\Login;
use App\Core\Middlewares;
use App\Core\Response;

class GuestMiddleware extends Middlewares
{
    public function handle($routeKey = '')
    {

        // Các router nào đã đăng nhập rồi thì không thể vào lại được cho quay về trang chủ
        $login = new Login();
        // Bổ sung các route liên quan đến authentication sau
        if ($routeKey == 'dang-ky' || $routeKey == 'dang-nhap') {
            if ($login->isLogin()) {
                Response::redirect('');
            }
        }
    }
}
