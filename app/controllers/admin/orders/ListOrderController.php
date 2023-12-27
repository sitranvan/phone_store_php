<?php

use App\Core\Controller;
use App\Model\Order;

class ListOrderController extends Controller
{
    private $data = [];
    private $order;
    public function __construct()
    {
        $this->order = new Order();
    }
    public function index()
    {
        $orders = $this->order->getAllOrder();
        $this->data['forward']['orders'] = $orders;
        $this->data["title"] = "Danh sách đơn hàng";
        $this->data["view"] = $this->view(_ADMIN, "orders/index");
        return $this->layout("admin_layout", $this->data);
    }
}
