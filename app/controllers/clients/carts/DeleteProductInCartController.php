<?php

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;

class DeleteProductInCartController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index($id)
    {
        $products = Session::data('products');


        foreach ($products as $key => $product) {
            if ($product['id'] == $id) {
                if (count($products) == 1) {
                    Session::delete('products');
                }
                // Xóa phần tử khỏi mảng
                unset($products[$key]);

                // Cập nhật lại session với mảng mới
                Session::data('products', $products);

                // Gửi thông báo và chuyển hướng
                Session::flash('toast', toast('Xóa sản phẩm thành công!', 'success'));
                Response::redirect('gio-hang');
            }
        }
    }
}
