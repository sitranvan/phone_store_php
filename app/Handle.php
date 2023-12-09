<?php

namespace App;

class Handle
{

    public function authentication($configName, $routeKey = '')
    {
        $middlewareClass = $configName['className'];
        $routes = $configName['routes'];
        $file  =  'app/middlewares/' . basename($middlewareClass) . '.php';
        if (file_exists($file)) {
            $middleware = new $middlewareClass();
            if (in_array($routeKey, $routes)) {
                $middleware->handle($routeKey);
            }
        }
    }
    public function guestMiddleware($routeKey = '/')
    {
        global $guestRoutes;
        $this->authentication($guestRoutes, $routeKey);
    }

    public function authMiddleware($routeKey = '/')
    {
        global $authRoutes;
        $this->authentication($authRoutes, $routeKey);
    }
    public function adminMiddleware($routeKey = '/')
    {
        global $adminRoutes;
        $this->authentication($adminRoutes, $routeKey);
    }


    public function dataProvider()
    {
        global $dataProvider;
        $file  =  'app/providers/' . basename($dataProvider) . '.php';
        if (file_exists($file)) {
            $provider = new $dataProvider();
            $provider->boot();
        }
    }
}
