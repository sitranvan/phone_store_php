<?php

use App\Classes\Login;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\User;

class CreateOrderController extends Controller
{
    private $data = [];
    private $user;
    private $order;
    private $orderDetail;
    public function __construct()
    {
        $this->user = new User();
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
    }
    public function index()
    {
        $dataCarts = Session::data('products') ?? [];
        if (count($dataCarts) <= 0) {
            Response::redirect('gio-hang');
        }
        $this->data["title"] = "Tạo đơn hàng";
        $this->data["view"] = $this->view(_CLENTS, "orders/index");
        $profile = $this->user->getProfile();
        $this->data['forward']['profile'] = $profile;
        $address = $profile['city'] . ', ' . $profile['district'] . ', ' . $profile['village'] . ', ' . $profile['description'];
        $this->data['forward']['address'] = $address;
        return $this->layout("client_layout", $this->data);
    }


    public function createOrder()
    {
        $dataCarts = Session::data('products');
        $request = new Request();
        $login = new Login();
        $userId = $login->getUser()['id'];

        $total = 0;
        foreach ($dataCarts as $product) {
            $total += $product['price'] * $product['quantity'];
        }

        if ($request->isPost()) {
            $randomOrderCode = generateRandomString();
            $dataOrder = [
                'order_code' => $randomOrderCode,
                'user_id' => $userId,
                'order_date' => date('Y-m-d H:i:s'),
                'total' => $total,
                'note' => $request->get('note'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // Thêm đơn hàng và kiểm tra kết quả
            $statusOrder = $this->order->createOrder($dataOrder);

            // Lưu ý: Bạn cần kiểm tra $statusOrder trước khi tiếp tục
            if ($statusOrder) {
                // Lấy order_id vừa thêm
                $orderId = $this->order->lastInsertId();

                // Thêm chi tiết đơn hàng
                foreach ($dataCarts as $product) {
                    $dataOrderDetails = [
                        'order_id' => $orderId, // Sử dụng order_id vừa lấy được
                        'product_id' => $product['id'],
                        'quantity' => $product['quantity'],
                        'price' => $product['price'],
                        'created_at' => date('Y-m-d H:i:s')
                        // Các trường khác của bảng order_details nếu có
                    ];
                    $statusOrderDetail = $this->orderDetail->createOrderDetail($dataOrderDetails);
                }

                // Kiểm tra kết quả của tất cả các hành động
                if ($statusOrder && $statusOrderDetail) {
                    Session::flash('toast', toast('Đặt hàng thành công!', 'success'));
                    Session::delete('products');
                    Response::redirect('gio-hang');
                } else {
                    Response::setMessage('Đã có lỗi xảy ra vui lòng thử lại sau!', 'danger');
                    Response::redirect('tao-don-hang');
                }
            } else {
                // Xử lý trường hợp lỗi khi thêm đơn hàng
                Response::setMessage('Đã có lỗi xảy ra vui lòng thử lại sau!', 'danger');
                Response::redirect('tao-don-hang');
            }
        }
    }
}
