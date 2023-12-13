<?php

use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Brand;


class CreateBrandController extends Controller
{
    private $data = [];
    private $brand;
    public function __construct()
    {
        $this->brand = new Brand();
    }
    public function index()
    {
        $this->data["title"] = "Thêm thương hiệu";
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data["view"] = $this->view(_ADMIN, 'brands/create');
        return $this->layout("admin_layout", $this->data);
    }

    public function createBrand()
    {
        $request = new Request();
        $validate = new Validate();

        if ($request->isPost()) {
            $validate->brandName($request->get('name'), unique: true);
        }
        if (empty($validate->getErrors())) {
            $dataInsert = [
                'name' => $request->get('name'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $insertStatus = $this->brand->createBrand($dataInsert);
            if ($insertStatus) {
                Session::flash('toast', toast('Tạo thương hiệu thành công', 'success'));
                Response::redirect('admin/thuong-hieu');
            } else {
                Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
            }
        } else {
            Response::setMessage('Vui lòng kiểm tra lại dữ liệu nhập vào');
            Session::flash('old', $request->getAll());
            Session::flash('errors', $validate->getErrors());
        }
        Response::redirect('admin/them-thuong-hieu');
    }
}
