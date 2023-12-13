<?php

use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Category;

class CreateCategoryController extends Controller
{
    private $data = [];
    private $category;
    public function __construct()
    {
        $this->category = new Category();
    }
    public function index()
    {
        $this->data["title"] = "Thêm danh danh mục";
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data["view"] = $this->view(_ADMIN, 'categories/create');
        return $this->layout("admin_layout", $this->data);
    }

    public function createCategory()
    {
        $request = new Request();
        $validate = new Validate();

        if ($request->isPost()) {
            $validate->categoryName($request->get('name'), unique: true);
        }
        if (empty($validate->getErrors())) {
            $dataInsert = [
                'name' => $request->get('name'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $insertStatus = $this->category->createCategory($dataInsert);
            if ($insertStatus) {
                Session::flash('toast', toast('Tạo danh mục thành công', 'success'));
                Response::redirect('admin/danh-muc');
            } else {
                Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
            }
        } else {
            Response::setMessage('Vui lòng kiểm tra lại dữ liệu nhập vào');
            Session::flash('old', $request->getAll());
            Session::flash('errors', $validate->getErrors());
        }
        Response::redirect('admin/them-danh-muc');
    }
}
