<?php

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;
use App\Model\Brand;


class DeleteBrandController extends Controller
{
    private $data = [];
    private $brand;
    public function __construct()
    {
        $this->brand = new Brand();
    }
    public function index($id)
    {
        $deleteStatus = $this->brand->deleteBrand($id);
        if ($deleteStatus) {
            Session::flash('toast', toast('Xóa thương hiệu thành công', 'success'));
            Response::redirect('admin/thuong-hieu');
        } else {
            Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
        }
    }
}
