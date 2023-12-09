<?php

use App\Classes\MyMailer;
use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\User;

class ForgotPasswordController extends Controller
{
    private $user;
    private $data = [];
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $this->data['title'] = 'Quên mật khẩu';
        $this->data['view'] = $this->view(_CLENTS, 'auth/forgot_password');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        return $this->layout('empty_layout', $this->data);
    }

    public function forgotPassword()
    {
        $request = new Request();
        $validate = new Validate();
        $mailer = new MyMailer();

        if ($request->isPost()) {
            $validate->email($request->get('email'));
            $email = $request->get('email');
            $condition = "email='$email'";
            $userInfo = $this->user->getUser($condition);

            if (empty($validate->getErrors())) {
                $userId = $userInfo['id'];
                $conditionUpdate = "id='$userId'";
                $forgotToken = sha1(uniqid() . time());
                $dataUpdate = [
                    'forgot_token' => $forgotToken,
                    'forgot_expires' => dateDB()
                ];
                $updateStatus = $this->user->updateUser($dataUpdate, $conditionUpdate);
                if ($updateStatus) {
                    $linkReset = _WEB_ROOT . '/khoi-phuc-mat-khau?token=' . $forgotToken;
                    $subject = 'Yêu cầu khôi phục mật khẩu';
                    $content = getContentForgotPassword($linkReset);
                    $mailerStatus = $mailer->sendMail($email, $subject, $content);
                    if ($mailerStatus) {
                        Response::setMessage('Vui lòng kiểm tra email để tiến hành đặt lại mật khẩu!', 'success');
                        Session::data('email', $email);
                        Session::flash('toast', toast('Gửi yêu cầu thành công!', 'success'));
                        Response::redirect('gui-lai-yeu-cau-quen-mat-khau');
                    } else {
                        Response::setMessage('Hệ thống đang gặp lỗi, vui lòng thử lại sau!', 'danger');
                    }
                }
            } else {
                Session::flash('errors', $validate->getErrors());
                Session::flash('old', $request->getAll());
                Response::setMessage('Vui lòng kiểm tra dữ liệu nhập vào!');
            }
        }
        Response::redirect('quen-mat-khau');
    }
}
