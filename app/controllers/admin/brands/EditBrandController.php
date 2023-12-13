<?php

use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Brand;


class EditBrandController extends Controller
{
    private $data = [];
    private $brand;
    public function __construct()
    {
        $this->brand = new Brand();
    }
    public function index($id)
    {
        Session::flash('id', $id);
        $brand = $this->brand->getBrand($id);
        $this->data["title"] = "Thêm thương hiệu";
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['brand'] = $brand;
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data["view"] = $this->view(_ADMIN, 'brands/edit');
        return $this->layout("admin_layout", $this->data);
    }

    public function updateBrand()
    {
        $id = Session::flash('id');
        $request = new Request();
        $validate = new Validate();

        if ($request->isPost()) {
            $validate->brandName($request->get('name'));
        }

        if (empty($validate->getErrors())) {
            $dataUpdate = [
                'name' => $request->get('name'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $updateStatus = $this->brand->updateBrand($dataUpdate, $id);
            if ($updateStatus) {
                Session::flash('toast', toast('Cập nhật thương hiệu thành công', 'success'));
                Response::redirect('admin/thuong-hieu');
            } else {
                Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
            }
        } else {
            Response::setMessage('Vui lòng kiêm tra lại thông tin nhập vào');
            Session::flash('old', $request->getAll());
            Session::flash('errors', $validate->getErrors());
        }
        Response::redirect('admin/sua-thuong-hieu/' . $id);
    }
}
