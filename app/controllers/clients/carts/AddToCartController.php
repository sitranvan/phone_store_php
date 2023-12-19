<?php

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;
use App\Model\Product;

class AddToCartController extends Controller
{
    private $data = [];
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index($id)
    {
        $product = $this->product->getProduct($id);

        // Lấy mảng sản phẩm từ session (nếu tồn tại)
        $existingProducts = Session::data('products');

        // Kiểm tra xem mảng đã tồn tại hay chưa
        if ($existingProducts === null) {
            $existingProducts = [];
        }

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không (dựa trên ID)
        $productExists = false;
        foreach ($existingProducts as $existingProduct) {
            if ($existingProduct['id'] == $id) {
                $productExists = true;
                break;
            }
        }

        // Nếu sản phẩm không tồn tại, thêm vào giỏ hàng
        if (!$productExists) {
            // Tạo một mảng mới chỉ chứa các trường bạn quan tâm
            $newProduct = [
                'id' => $id, // Thêm ID sản phẩm vào mảng để kiểm tra trùng lặp
                'name' => $product['product_name'],
                'photo' => $product['photo'],
                'price' => $product['price'],
                'price_promotion' => $product['price_promotion'],
                'brand_name' => $product['brand_name'],

            ];

            // Thêm phần tử mới vào đầu mảng
            array_unshift($existingProducts, $newProduct);

            // Lưu mảng mới xuống session
            Session::data('products', $existingProducts);

            Session::flash('toast', toast('Thêm vào giỏ hàng thành công!', 'success'));
        } else {
            // Nếu sản phẩm đã tồn tại, bạn có thể thực hiện hành động nào đó, ví dụ: hiển thị thông báo
            Session::flash('toast', toast('Sản phẩm đã có trong giỏ hàng!', 'error'));
            Response::redirect('chi-tiet/' . $product['product_id']);
        }

        Response::redirect('');
    }
}
