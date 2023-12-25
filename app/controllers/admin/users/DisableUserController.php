<?php

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;
use App\Model\User;

class DisableUserController extends Controller
{
    private $data = [];
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index($id)
    {
        $user = $this->user->getUser("id=" . $id);
        $statusUpdate = null;
        $msg = '';
        if ($user['status'] == 0) {
            $dataUpdate = [
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $statusUpdate = $this->user->updateUser($dataUpdate, "id=" . $id);
            $msg = 'Vô hiệu hóa tài khoản thành công';
        } else {
            $dataUpdate = [
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $statusUpdate = $this->user->updateUser($dataUpdate, "id=" . $id);
            $msg = 'Mở khóa tài khoản thành công';
        }
        if ($statusUpdate) {
            Session::flash('toast', toast($msg, 'success'));
        } else {
            Session::flash('toast', toast('Đã có lỗi xảy ra', 'error'));
        }
        Response::redirect('admin/nguoi-dung');
    }
}
