<?php

namespace App\Classes;

use App\Core\Cookie;
use App\Core\DataBase;
use App\Core\Session;
use App\Model\UserSession;

class Login
{
    private $db;
    private $userSession;
    public function __construct()
    {
        $this->db = new DataBase();
        $this->userSession = new UserSession();
    }
    public function getUser()
    {
        $loginToken =  Session::data('session_token') ?? Cookie::get('remember_token');

        if (isset($loginToken)) {
            $query = "SELECT u.* FROM users u
            JOIN user_sessions us ON us.user_id = u.id
            WHERE us.token = '$loginToken'";
            return $this->db->fetchDB($query);
        }
    }


    public static function loginUser()
    {
        $user = new Login();
        if (!empty($user->getUser())) {
            return true;
        }
        return false;
    }

    public function isLogin()
    {
        $rememberToken = Cookie::get('remember_token');
        $loginToken =  Session::data('session_token') ?? $rememberToken;
        $tempToken = Cookie::get('temp_token') ?? '';

        if (isset($loginToken)) {

            $condition = "token='$loginToken'";
            $checkLogin = null;
            $checkUserLogin = $this->userSession->checkExists($condition);

            if ($checkUserLogin) {
                $checkLogin = $checkUserLogin;
            }

            if ($checkLogin) {
                return true;
            } else {
                if (isset($rememberToken)) {
                    Cookie::set('remember_token', expires: time() - _COOKIE_EXPIRES_TIME);
                }
                Cookie::set('temp_token', expires: time() - _COOKIE_EXPIRES_TIME);
            }
        } else {

            $condition = "token='$tempToken'";
            $this->userSession->deleteUserSession($condition);
            Cookie::set('temp_token', expires: time() - _COOKIE_EXPIRES_TIME);
        }
        return false;
    }
}
