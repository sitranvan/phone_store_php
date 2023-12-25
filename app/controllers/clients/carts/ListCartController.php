<?php

use App\Core\Controller;
use App\Core\Session;

class ListCartController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {

        $cartProducts = Session::data('products');
        $total = 0;
        foreach ($cartProducts as $product) {
            $total += $product['price'] * $product['quantity'];
        }
        $this->data["title"] = "Giỏ hàng";
        $this->data["view"] = $this->view(_CLENTS, "carts/index");
        $this->data['forward']['cartProducts'] = $cartProducts;
        $this->data['forward']['total'] = $total;
        return $this->layout("client_layout", $this->data);
    }
}
