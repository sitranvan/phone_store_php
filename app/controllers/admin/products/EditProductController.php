<?php

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;

class EditProductController extends Controller
{
    private $data = [];
    private $brand;
    private $category;
    private $product;
    public function __construct()
    {
        $this->brand = new Brand();
        $this->category = new Category();
        $this->product = new Product();
    }
    public function index($id)
    {
        Session::flash('id', $id);
        $allBrand = $this->brand->getAllBrand();
        $allCategory = $this->category->getAllCategory();
        $product = $this->product->getProduct($id);

        $this->data["title"] = "Sửa sản phẩm";
        $this->data['forward']['product'] = $product;
        $this->data['forward']['allBrand'] = $allBrand;
        $this->data['forward']['allCategory'] = $allCategory;

        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        $this->data['view'] = $this->view(_ADMIN, 'products/edit');
        return $this->layout("admin_layout", $this->data);
    }

    public function updateProduct()
    {
        $id = Session::flash('id');
        $request = new Request();

        if ($request->isPost()) {
            // Xử lý upload hình ảnh
            $fileName = $request->getFile('photo')['name'];
            $tmpFileName = $request->getFile('photo')['tmp_name'];
            $fileName = time() . '_' . $fileName;
            $targetFilePath = 'app/uploads/' . $fileName;
            move_uploaded_file($tmpFileName, $targetFilePath);

            $dataUpdate = [
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'price_promotion' => $request->get('price_promotion'),
                'description' => $request->get('description'),
                'photo' => $fileName,
                'active' => $request->get('active'),
                'category_id' => $request->get('category_id'),
                'brand_id' => $request->get('brand_id'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];


            $updateStatus = $this->product->updateProduct($dataUpdate, $id);
            if ($updateStatus) {
                Session::flash('toast', toast('Cập nhật sản phẩm thành công', 'success'));
                Response::redirect('admin/san-pham');
            } else {
                Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
            }
        }
    }
}
