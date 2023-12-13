<?php

use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Category;

class EditCategoryController extends Controller
{
    private $data = [];
    private $category;
    public function __construct()
    {
        $this->category = new Category();
    }
    public function index($id)
    {
        Session::flash('id', $id);
        $category = $this->category->getCategory($id);
        $this->data["title"] = "Thêm danh danh mục";
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['category'] = $category;
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data["view"] = $this->view(_ADMIN, 'categories/edit');
        return $this->layout("admin_layout", $this->data);
    }

    public function updateCategory()
    {
        $id = Session::flash('id');
        $request = new Request();
        $validate = new Validate();

        if ($request->isPost()) {
            $validate->categoryName($request->get('name'));
        }

        if (empty($validate->getErrors())) {
            $dataUpdate = [
                'name' => $request->get('name'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $updateStatus = $this->category->updateCategory($dataUpdate, $id);
            if ($updateStatus) {
                Session::flash('toast', toast('Cập nhật danh mục thành công', 'success'));
                Response::redirect('admin/danh-muc');
            } else {
                Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
            }
        } else {
            Response::setMessage('Vui lòng kiêm tra lại thông tin nhập vào');
            Session::flash('old', $request->getAll());
            Session::flash('errors', $validate->getErrors());
        }
        Response::redirect('admin/sua-danh-muc/' . $id);
    }
}
