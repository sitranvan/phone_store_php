<?php

use App\Core\Controller;

class CategoryController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data["title"] = "Category";
        $this->data["view"] = $this->view(_ADMIN, 'categories/index');
        return $this->layout("admin_layout", $this->data);
    }
}
