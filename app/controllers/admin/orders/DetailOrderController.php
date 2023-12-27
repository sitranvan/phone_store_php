<?php

use App\Core\Controller;
use App\Model\Order;
use App\Model\OrderDetail;

class DetailOrderController extends Controller
{
    private $data = [];
    private $order;
    private $orderDetail;
    public function __construct()
    {
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
    }
    public function index($orderId)
    {
        $allProductOrder = $this->orderDetail->getAllMyOrderProduct($orderId);
        $order = $this->order->getOrder($orderId);
        $address = $order['city'] . ', ' . $order['district'] . ', ' . $order['village'] . ', ' . $order['description'];
        $this->data["title"] = "Chi tiết đơn hàng";
        $this->data['forward']['order'] = $order;
        $this->data['forward']['address'] = $address;
        $this->data['forward']['allProductOrder'] = $allProductOrder;
        $this->data["view"] = $this->view(_ADMIN, 'orders/detail');
        return $this->layout("admin_layout", $this->data);
    }
}
