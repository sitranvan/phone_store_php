<?php

use App\Core\Controller;
use App\Model\Product;

class ListProductController extends Controller
{
    private $data = [];
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $allProduct = $this->product->getAllProduct();

        $this->data["title"] = "Danh sách sản phẩm";
        $this->data['view'] = $this->view(_ADMIN, 'products/index');
        $this->data['forward']['allProduct'] = $allProduct;
        return $this->layout("admin_layout", $this->data);
    }
}
