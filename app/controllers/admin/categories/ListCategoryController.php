<?php

use App\Core\Controller;
use App\Core\Session;

class ListCategoryController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data["title"] = "Danh sách danh mục";
        $this->data["view"] = $this->view(_ADMIN, 'categories/index');
        return $this->layout("admin_layout", $this->data);
    }
}
