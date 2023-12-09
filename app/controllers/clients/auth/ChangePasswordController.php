<?php

use App\Classes\Login;
use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\User;

class ChangePasswordController extends Controller
{
    private $user;
    private $data = [];
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $this->data['title'] = 'Thay đổi mật khẩu';
        $this->data['view'] = $this->view(_CLENTS, 'auth/change_password');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        return $this->layout("empty_layout", $this->data);
    }
    public function changePassword()
    {
        $request = new Request();
        $validate = new Validate();
        if ($request->isPost()) {
            $validate->oldPassword($request->get('old_password'));
            $validate->newPassword($request->get('new_password'));
            $validate->confirmNewPassword($request->get('confirm_new_password'), $request->get('new_password'));
            if (empty($validate->getErrors())) {
                // Thay đổi mật khẩu
                $dataUpdate = [
                    'password' =>  password_hash($request->get('new_password'), PASSWORD_DEFAULT),
                    'updated_at' => dateDB()
                ];
                $userId = $this->getUserId();
                $condition = "id='$userId'";
                $updateStatus = $this->user->updateUser($dataUpdate, $condition);
                if ($updateStatus) {
                    $linkLogout = route('dang-xuat');
                    Response::setMessage('Thay đổi mật khẩu thành công, bạn có muốn đăng xuất? <a href=' . $linkLogout . '>Đăng xuất!</a>', 'success');
                } else {
                    Response::setMessage('Hệ thống đang gặp lỗi, vui lòng thử lại sau!', 'danger');
                }
            } else {
                Session::flash('errors', $validate->getErrors());
                Response::setMessage('Vui lòng kiểm tra dữ liệu nhập vào!');
            }
        }
        Response::redirect('thay-doi-mat-khau');
    }

    public function getUserId()
    {
        $login = new Login();
        if (!empty($login->getUser())) {
            return $login->getUser()['id'];
        }
    }
}
