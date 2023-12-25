<?php

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Order;
use App\Model\OrderDetail;

class CancelOrderController extends Controller
{
    private $data = [];
    private $order;
    private $orderDetail;
    public function __construct()
    {
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
    }
    public function index()
    {
        $request = new Request();
        if ($request->isPost()) {
            $orderId = $request->get('orderId');

            // Chỉ hủy được đơn hàng chưa xác nhận và đã được xác nhận
            $order = $this->order->getMyOrder($orderId);
            $orderDetail = $this->orderDetail->getAllOrderDetail($orderId);


            if (!empty($order) && ($order['status'] == 0 || $order['status'] == 1)) {
                $dataUpdate = [
                    'status' => 4,
                    'reason' => $request->get('reason'),
                    'cancel_date' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                foreach ($orderDetail as $detail) {
                    $dataOrderDetailUpdate = [
                        'is_cancel' => 1,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $this->orderDetail->updateOrderDetail($dataOrderDetailUpdate, $detail['order_id']);
                }

                $statusUpdate = $this->order->updateOrder($dataUpdate, $orderId);
                if ($statusUpdate) {
                    Session::flash('toast', toast('Hủy đơn hàng thành công!', 'success'));
                }
            } else {
                Session::flash('toast', toast('Không thể hủy được đơn hàng!', 'error'));
            }
            Response::redirect('don-hang-cua-toi');
        }
    }
}
