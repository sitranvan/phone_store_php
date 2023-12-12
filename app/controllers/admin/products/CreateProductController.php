<?php

use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;

class CreateProductController extends Controller
{
    private $data = [];
    private $product;
    private $brand;
    private $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->brand = new Brand();
        $this->category = new Category();
    }
    public function index()
    {

        $allBrand = $this->brand->getAllBrand();
        $allCategory = $this->category->getAllCategory();

        $this->data["title"] = "Thêm sản phẩm";
        $this->data['forward']['allBrand'] = $allBrand;
        $this->data['forward']['allCategory'] = $allCategory;
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['view'] = $this->view(_ADMIN, 'products/create');

        return $this->layout("admin_layout", $this->data);
    }
    public function createProduct()
    {
        $request = new Request();
        $validate = new Validate();

        if ($request->isPost()) {

            $validate->productName($request->get('name'));
            $validate->productPrice($request->get('price'));
            $validate->productFile($request->getFile('photo')['name']);
        }
        if (empty($validate->getErrors())) {
            // Xử lý upload hình ảnh
            $fileName = $request->getFile('photo')['name'];
            $tmpFileName = $request->getFile('photo')['tmp_name'];
            $fileName = time() . '_' . $fileName;
            $targetFilePath = 'app/uploads/' . $fileName;
            move_uploaded_file($tmpFileName, $targetFilePath);

            $dataInsert = [
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'price_promotion' => $request->get('price_promotion'),
                'description' => $request->get('description'),
                'photo' => $fileName,
                'active' => $request->get('active'),
                'category_id' => $request->get('category_id'),
                'brand_id' => $request->get('brand_id'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $createStatus = $this->product->createProduct($dataInsert);
            if ($createStatus) {
                Session::flash('toast', toast('Tạo sản phẩm thành công', 'success'));
                Response::redirect('admin');
            } else {
                Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
            }
        } else {
            Response::setMessage('Vui lòng kiêm tra lại thông tin nhập vào');
            Session::flash('old', $request->getAll());
            Session::flash('errors', $validate->getErrors());
        }
        Response::redirect('admin/them-san-pham');
    }
}
