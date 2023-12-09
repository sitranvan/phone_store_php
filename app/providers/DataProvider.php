<?php

namespace App\Providers;

use App\Classes\Login;
use App\Core\ServiceProvider;
use App\Core\View;

class DataProvider extends ServiceProvider
{
    public function boot()
    {

        $login = new Login();
        $infoLogin = null;
        if (!empty($login->getUser())) {
            $infoLogin = $login->getUser();
        }

        View::share($infoLogin);
    }
}
