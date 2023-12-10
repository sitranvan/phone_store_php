<?php

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;
use App\Model\Product;

class DeleteProductController extends Controller
{
    private $data = [];
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index($id)
    {
        $deleteStatus = $this->product->deleteProduct($id);
        if ($deleteStatus) {
            Session::flash('toast', toast('Xoas sản phẩm thành công', 'success'));
            Response::redirect('admin/san-pham');
        } else {
            Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
        }
    }
}
