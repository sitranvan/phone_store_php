<?php

use App\Classes\MyMailer;
use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\User;
use App\Model\Verify;

class RegisterController extends Controller
{
    private $data = [];
    private $user;
    private $verify;
    public function __construct()
    {
        $this->user = new User();
        $this->verify = new Verify();
    }
    public function index()
    {
        $this->data['title'] = 'Đăng ký';
        $this->data['view'] = $this->view(_CLENTS, 'auth/register');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        return $this->layout('empty_layout', $this->data);
    }

    public function register()
    {
        $request = new Request();
        $validate = new Validate();
        $mailer = new MyMailer();
        if ($request->isPost()) {
            // Validate
            $validate->fullname($request->get('fullname'));
            $validate->email($request->get('email'), unique: true);
            $validate->password($request->get('password'));
            $validate->confirmPassword($request->get('confirm_password'), $request->get('password'));
            if (empty($validate->getErrors())) {
                // Xử lý đăng ký tài khoản

                $otp = generateVerifiedCode();
                $dataInsert = [
                    'fullname' => $request->get('fullname'),
                    'email' => $request->get('email'),
                    'password' => password_hash($request->get('password'), PASSWORD_DEFAULT),
                    'created_at' => dateDB(),
                    'updated_at' => dateDB()
                ];
                $insertStatus = $this->user->insertUser($dataInsert);
                $userId = $this->user->getIdInsert();

                if (!empty($userId)) {
                    $dataInsertVerify = [
                        'code' => $otp,
                        'expires' => dateDB(),
                        'user_id' => $userId,
                        'created_at' => dateDB(),
                        'updated_at' => dateDB()
                    ];
                    $this->verify->insertVerify($dataInsertVerify);
                }

                if ($insertStatus) {
                    // Gửi mail
                    $subject = 'Xác thực tài khoản';
                    $content = getContentVerified($otp);

                    $mailerStatus = $mailer->sendMail($request->get('email'), $subject, $content);
                    if ($mailerStatus) {
                        Response::setMessage('Vui lòng kiểm tra email để xác thực!', 'success');
                        Response::redirect('xac-thuc?id=' . $userId);
                    } else {
                        Response::setMessage('Đã xảy ra lỗi vui lòng thử lại sau!', 'danger');
                    }
                } else {
                    Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
                }
            } else {
                Session::flash('errors', $validate->getErrors());
                Session::flash('old', $request->getAll());
                Response::setMessage('Vui lòng kiểm tra dữ liệu nhập vào!');
            }

            Response::redirect('dang-ky');
        }
    }
}
