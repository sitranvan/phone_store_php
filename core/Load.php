<?php

namespace App\Core;


class Load
{
    public static function renderError($errorName = '404', $data = [])
    {
        extract($data);
        $fileError =  _DIR_ROOT . '/app/errors/' . $errorName . '.php';
        require_once $fileError;
        exit;
    }
}
