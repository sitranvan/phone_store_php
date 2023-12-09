<?php

namespace App;

use App\Core\Load;
use App\Handle;
use App\Core\Route;

class App
{
    private $controller;
    private $action;
    private $params;
    private $routes;
    private static $app;
    public function __construct()
    {

        self::$app = $this;
        $this->routes = new Route();
        $this->controller = 'HomeController';
        $this->action = 'index';
        $this->params = [];
        $this->handleUrl();
    }
    final public static function getApp()
    {
        return self::$app;
    }

    // Xử lí url
    public function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            return $_SERVER['PATH_INFO'];
        } else {
            return '/';
        }
    }

    public function handleUrl()
    {

        $url = $this->getUrl();
        $url = $this->routes->handleRoute($url);

        $this->middlewares();
        $this->providers();


        $urlArray = array_filter(explode('/', $url));
        $urlArray = array_values($urlArray);

        // Xử lí trường hợp nếu bên trong controller có thư mục và mới đến controller
        $controllerPath = 'app/controllers';
        $urlCheck = '';
        foreach ($urlArray as $key => $item) {
            $urlCheck .= $item . '/';
            $fileCheck = rtrim($urlCheck, '/');
            $fileArray = explode('/', $fileCheck);
            $fileArray[$key] = ucfirst($fileArray[$key]);
            $fileCheck = implode('/', $fileArray);
            if (!empty($urlArray[$key - 1])) {
                unset($urlArray[$key - 1]);
            }
            if (file_exists($controllerPath . '/' . $fileCheck . '.php')) {
                $urlCheck = $fileCheck;
                break;
            }
        }
        $urlArray = array_values($urlArray);
        // Xử lí khi $urlCheck rỗng
        if (empty($urlCheck)) {
            // Lấy controller mặc định nếu path là /
            $urlCheck =  _CLENTS . '/' . $this->controller;
        }
        // Xử lí controller
        $this->controller = ucfirst(!empty($urlArray[0]) ? $urlArray[0] : $this->controller);
        $controllerFile = $controllerPath . '/' . $urlCheck . '.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($this->controller)) {
                $this->controller = new $this->controller();
                unset($urlArray[0]);
            } else {
                Load::renderError();
            }
        } else {
            Load::renderError();
        }
        // Xử lí action
        $this->action = !empty($urlArray[1]) ? $urlArray[1] : $this->action;
        unset($urlArray[1]);

        // Xử lí params
        $this->params = array_values($urlArray);

        // Kiểm tra method tồn tại
        if (method_exists($this->controller, $this->action)) {
            call_user_func_array([$this->controller, $this->action], $this->params);
        } else {
            Load::renderError();
        }
    }
    public function getUriRoute()
    {
        return $this->routes->getUri();
    }

    public function middlewares()
    {
        $handle = new Handle();
        $handle->guestMiddleware($this->getUriRoute());
        $handle->authMiddleware($this->getUriRoute());
        $handle->adminMiddleware($this->getUriRoute());
    }

    public function providers()
    {
        $handle = new Handle();
        $handle->dataProvider();
    }
}
