<?php

use App\Core\Controller;
use App\Model\Order;

class MyOrderController extends Controller
{
    private $data = [];
    private $order;
    public function __construct()
    {
        $this->order = new Order();
    }
    public function index()
    {
        $orders = $this->order->getAllMyOrder();
        $this->data["title"] = "Đơn hàng của tôi";
        $this->data["forward"]['orders'] = $orders;
        $this->data["view"] = $this->view(_CLENTS, "orders/my_order");
        return $this->layout("client_layout", $this->data);
    }
}
