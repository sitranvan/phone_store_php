<?php

namespace App\Middlewares;

use App\Classes\Login;
use App\Core\Middlewares;
use App\Core\Response;

class AdminMiddleware extends Middlewares
{
    public function handle()
    {

        // xử lí liên quan đến admin
        $login = new Login();
        if ($login->isLogin()) {
            if ($login->getUser()['role_id'] != 1) {
                Response::redirect('');
            }
        } else {
            Response::redirect('');
        }
    }
}
