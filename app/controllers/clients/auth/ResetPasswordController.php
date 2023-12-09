<?php

use App\Classes\Helpers;
use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Load;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\User;

class ResetPasswordController extends Controller
{
    private $user;
    private $data = [];
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $request = new Request();
        $this->data['title'] = 'Đặt lại mật khẩu';
        $this->data["view"] = $this->view(_CLENTS, 'auth/reset_password');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');

        if ($request->isGet()) {
            $forgotToken = $request->get('token');
            Session::flash('forgotToken', $forgotToken);
            $condition = "forgot_token='$forgotToken'";
            $userForgot = $this->user->getUser($condition);

            // Kiểm tra link không tồn tại hoặc hết hạn
            if (empty($userForgot)) {
                Load::renderError('404');
            } else {
                $forgotExpires = Helpers::checkTimeVerified($userForgot['forgot_expires']);
                if ($forgotExpires > _FORGOT_EXPIRES) {
                    $this->data['message'] = 'Yêu cầu khôi phục mật khẩu đã hết hạn, vui lòng yêu cầu lại!';
                    Load::renderError('expires', $this->data);
                }
            }
        }

        return $this->layout('empty_layout', $this->data);
    }

    public function resetPassword()
    {
        $request = new Request();
        $validate = new Validate();
        $forgotToken = Session::flash('forgotToken');

        if ($request->isPost()) {


            $validate->password($request->get('password'));
            $validate->confirmPassword($request->get('confirm_password'), $request->get('password'));
            $condition = "forgot_token='$forgotToken'";
            $userForgot = $this->user->getUser($condition);
            $userId = $userForgot['id'];

            if (empty($validate->getErrors())) {

                $dataUpdate = [
                    'password' => password_hash($request->get('password'), PASSWORD_DEFAULT),
                    'forgot_token' => null,
                    'forgot_expires' => null,
                    'updated_at' => dateDB(),
                ];
                $conditionId = "id='$userId'";

                $updateStatus = $this->user->updateUser($dataUpdate, $conditionId);
                if ($updateStatus) {
                    Response::setMessage('Đặt lại mật khẩu thành công, vui lòng đăng nhập bằng mật khẩu mới!', 'success');
                    Response::redirect('dang-nhap');
                } else {
                    Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau!', 'danger');
                }
            } else {
                Session::flash('errors', $validate->getErrors());
                Response::setMessage('Vui lòng kiểm tra dữ liệu nhập vào!');
            }
        }
        Response::redirect('khoi-phuc-mat-khau?token=' . $forgotToken);
    }
}
