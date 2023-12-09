<?php

use App\Core\Controller;
use App\Core\Cookie;
use App\Core\Response;
use App\Core\Session;
use App\Model\UserSession;

class LogoutController extends Controller
{
    private $userSession;
    private $data = [];

    public function __construct()
    {
        $this->userSession = new UserSession();
    }
    public function index()
    {
        $rememberToken = Cookie::get('remember_token');
        $loginToken =  Session::data('session_token') ?? $rememberToken;
        $condition = "token='$loginToken'";
        if (isset($rememberToken)) {
            Cookie::set('remember_token', expires: time() - _COOKIE_EXPIRES_TIME);
        }
        $deleteStatus = $this->userSession->deleteUserSession($condition);
        if ($deleteStatus) {
            Session::data('msg', 'hello');
            Session::delete('temp_token');
            Session::delete('session_token');
        }
        Session::flash('toast', toast('Đăng xuất thành công!', 'success'));
        Response::redirect('');
    }
}
