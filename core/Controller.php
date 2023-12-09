<?php

namespace App\Core;

class Controller
{
    public function loadModel($model = '')
    {
        $fileModel = _DIR_ROOT . '/app/models/' . $model . '.php';
        if (file_exists($fileModel)) {
            require_once $fileModel;
            $modelArr = explode('/', $model);
            $finalModel = end($modelArr);

            if (!empty($finalModel) && class_exists($finalModel)) {
                return new $finalModel();
            }
        }
        return false;
    }

    public function layout($path, $data = [])
    {
        if (!empty(View::$dataShare)) {
            $data = array_merge($data, View::$dataShare);
        }
        extract($data);
        $fileLayout =  _DIR_ROOT . '/app/views/layouts/' . $path . '.php';
        if (file_exists($fileLayout)) {
            require_once $fileLayout;
        }
    }

    public function view($role = '', $path = '')
    {
        return  $role . '/' . $path;
    }
}
