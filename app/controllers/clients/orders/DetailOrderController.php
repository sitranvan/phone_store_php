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
        $order = $this->order->getMyOrder($orderId);
        $allProductOrder = $this->orderDetail->getAllMyOrderProduct($orderId);


        $this->data['forward']['order'] = $order;
        $this->data['forward']['allProductOrder'] = $allProductOrder;
        $this->data["title"] = "Chi tiết đơn hàng";
        $this->data["view"] = $this->view(_CLENTS, "orders/detail");
        return $this->layout("client_layout", $this->data);
    }
}
