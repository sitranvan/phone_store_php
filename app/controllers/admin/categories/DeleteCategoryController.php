<?php

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;
use App\Model\Category;

class DeleteCategoryController extends Controller
{
    private $data = [];
    private $category;
    public function __construct()
    {
        $this->category = new Category();
    }
    public function index($id)
    {
        $deleteStatus = $this->category->deleteCategory($id);
        if ($deleteStatus) {
            Session::flash('toast', toast('Xóa danh mục thành công', 'success'));
            Response::redirect('admin/danh-muc');
        } else {
            Response::setMessage('Hệ thống đang gặp lỗi vui lòng thử lại sau', 'danger');
        }
    }
}
