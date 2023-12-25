<?php

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;

class UpdateQuantityController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $request = new Request();
        if ($request->isPost()) {

            // Lấy mảng sản phẩm từ session
            $existingProducts = Session::data('products') ?? [];

            // Mảng chứa ID và số lượng cần cập nhật
            $updateArray = $request->getAll()['quantity'];

            foreach ($updateArray as $productId => $newQuantity) {
                // Tìm kiếm sản phẩm trong mảng
                $keyToUpdate = array_search($productId, array_column($existingProducts, 'id'));

                if ($keyToUpdate !== false) {
                    // Nếu sản phẩm tồn tại trong mảng, cập nhật số lượng
                    $existingProducts[$keyToUpdate]['quantity'] = $newQuantity;
                } else {
                    // Nếu sản phẩm không tồn tại trong mảng, thêm mới sản phẩm
                    $newProduct = [
                        'id' => $productId,
                        // Thêm các trường khác nếu cần
                        'quantity' => $newQuantity,
                    ];
                    array_unshift($existingProducts, $newProduct);
                }
            }

            // Lưu mảng mới xuống session
            Session::data('products', $existingProducts);

            Session::flash('toast', toast('Cập nhật thành công!', 'success'));
            Response::redirect('gio-hang');
        }
    }
}
