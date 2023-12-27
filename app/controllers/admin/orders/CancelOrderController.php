<?php

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;
use App\Model\Order;

class CancelOrderController extends Controller
{
    private $data = [];
    private $order;
    public function __construct()
    {
        $this->order = new Order();
    }
    public function index($orderId)
    {
        $dataUpdate = [
            'status' => 4,
            'reason' => 'Hệ thống hủy đơn hàng vui lòng liên hệ lại',
            'cancel_date' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $updateStatus = $this->order->updateOrder($dataUpdate, $orderId);
        if ($updateStatus) {
            Session::flash('toast', toast('Cập nhật đơn hàng thành công!', 'success'));
        } else {
            Session::flash('toast', toast('Cập nhật đơn hàng thất bại!', 'error'));
        }
        Response::redirect('admin/don-hang');
    }
}
