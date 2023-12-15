<?php

use App\Core\Controller;
use App\Model\Product;

class ProductDetailController extends Controller
{
    private $data = [];
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index($id)
    {
        $product = $this->product->getBySql("SELECT products.name AS product_name, products.description AS product_description, products.photo AS product_photo, products.price AS product_price, products.price_promotion AS product_price_promotion,brands.name AS brand_name, categories.name AS category_name FROM products JOIN brands ON products.brand_id = brands.id JOIN categories ON products.category_id = categories.id WHERE products.id = $id");
        $this->data["title"] = "Chi tiết sản phẩm";
        $this->data['forward']['product'] = $product;
        $this->data["view"] = $this->view(_CLENTS, 'products/detail');
        return $this->layout("client_layout", $this->data);
    }
}
