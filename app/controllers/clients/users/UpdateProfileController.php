<?php

use App\Classes\Login;
use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Address;
use App\Model\User;

class UpdateProfileController extends Controller
{
    private $data = [];
    private $user;
    private $address;
    public function __construct()
    {
        $this->user = new User();
        $this->address = new Address();
    }
    public function index()
    {
        $profile = $this->user->getProfile();
        $this->data["title"] = "Thông tin cá nhân";
        $this->data['forward']['profile'] = $profile;
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        $this->data["view"] = $this->view(_CLENTS, "users/profile");
        return $this->layout("client_layout", $this->data);
    }

    public function updateProfile()
    {
        $request = new Request();
        $validate = new Validate();

        if ($request->isPost()) {
            $login = new Login();
            $userId = $login->getUser()['id'];
            $validate->required($request->get('fullname'), 'fullname', 'Họ tên không được bỏ trống');
            $validate->required($request->get('city'), 'city', 'Tỉnh thành không được bỏ trống');
            $validate->required($request->get('district'), 'district', 'Quận huyện không được bỏ trống');
            $validate->required($request->get('village'), 'village', 'Phường xã không được bỏ trống');
            $validate->required($request->get('phone'), 'phone', 'Số điện thoại không được bỏ trống');
            $validate->required($request->get('description'), 'description', 'Mô tả không được bỏ trống');

            if (empty($validate->getErrors())) {
                // Xử lý upload hình ảnh
                $fileName = $request->getFile('avatar')['name'];
                $dataUser = [
                    'fullname' => $request->get('fullname'),
                ];
                if (!empty($fileName)) {
                    $tmpFileName = $request->getFile('avatar')['tmp_name'];
                    $fileName = time() . '_' . $fileName;
                    $targetFilePath = 'app/uploads/' . $fileName;
                    move_uploaded_file($tmpFileName, $targetFilePath);
                    $dataUser['avatar'] = $fileName;
                }

                $dataAddress = [
                    'city' => $request->get('city'),
                    'district' => $request->get('district'),
                    'village' => $request->get('village'),
                    'phone' => $request->get('phone'),
                    'description' => $request->get('description'),
                ];

                $condition = "id=$userId";
                $updateUserStatus = $this->user->updateUser($dataUser, $condition);
                $updateAddressStatus = $this->address->updateAddress($dataAddress, $userId);
                if ($updateUserStatus && $updateAddressStatus) {
                    Session::flash('toast', toast('Cập nhật thông tin thành công', 'success'));
                } else {
                    Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
                }
            } else {
                Session::flash('errors', $validate->getErrors());
                Session::flash('old', $request->getAll());
                Response::setMessage('Vui lòng kiểm tra dữ liệu nhập vào!');
            }
            Response::redirect('thong-tin-ca-nhan');
        }
    }
}
