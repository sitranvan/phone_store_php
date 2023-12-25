<?php

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;
use App\Model\User;

class DeleteUserController extends Controller
{
    private $data = [];
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index($id)
    {
        $deleteStatus = $this->user->deleteUser($id);
        if ($deleteStatus) {
            Session::flash('toast', toast('Xóa người dùng thành công', 'success'));
            Response::redirect('admin/nguoi-dung');
        } else {
            Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
        }
    }
}
