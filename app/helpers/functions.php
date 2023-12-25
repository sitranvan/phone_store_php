<?php


use App\Core\View;

function loadView($path, $data = [])
{
    if (!empty(View::$dataShare)) {
        $data = array_merge($data, View::$dataShare);
    }
    extract($data);
    $fileView =  _DIR_ROOT . '/app/views/' . $path . '.php';
    if (file_exists($fileView)) {
        require_once $fileView;
    }
}

function pathAdmin($path = '')
{
    return _PUBLIC_ADMIN . '/' . $path;
}

function pathClients($path = '')
{
    return _PUBLIC_CLIENTS . '/' . $path;
}

function pathCommon($path = '')
{
    return _PUBLIC_COMMON . '/' . $path;
}


function route($route = '')
{
    return _WEB_ROOT . '/' . $route;
}



function dateDB()
{
    return date('Y-m-d H:i:s');
}



function generateVerifiedCode()
{
    $numbers = range(0, 9);
    shuffle($numbers);
    $code = 0;
    for ($i = 0; $i < 6; $i++) {
        $code .= $numbers[$i];
    }

    return (int)$code;
}

function checkTimeVerified($verifiedExpires)
{

    // Chuyển verifiedExpires về timestamp
    $timestamp = strtotime($verifiedExpires = '');

    $currentTime = time();

    return $currentTime - $timestamp;
}

function getImage($path)
{
    return _WEB_ROOT . '/app/uploads/' . $path;
}

function generateRandomString($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return strtoupper($randomString);
}
