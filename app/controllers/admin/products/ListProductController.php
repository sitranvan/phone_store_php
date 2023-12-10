<?php

use App\Core\Controller;

class ListProductController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data["title"] = "Danh sách sản phẩm";
        $this->data['view'] = $this->view(_ADMIN, 'products/index');
        return $this->layout("admin_layout", $this->data);
    }
}
