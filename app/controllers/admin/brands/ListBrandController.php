<?php

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Model\Brand;

class ListBrandController extends Controller
{
    private $data = [];
    private $brand;
    public function __construct()
    {
        $this->brand = new Brand();
    }
    public function index()
    {
        $request = new Request();
        if ($request->isGet()) {
            $allQuery = $request->getAll();
            $search = $request->get('search');
            $page = $request->get('page', 1);
        }

        $urlParams = [
            'search' => $search,
        ];

        $queryString = http_build_query($urlParams);
        $allBrand = $this->brand->getAllBrand($search, $page);
        $totalPage = count($allBrand);

        $this->data["title"] = "Danh sách thương hiệu";
        $this->data['forward']['allBrand'] = $allBrand;
        $this->data['forward']['allQuery'] = $allQuery;
        $this->data['forward']['page'] = $page;
        $this->data['forward']['totalPage'] = $totalPage;
        $this->data['forward']['queryString'] = $queryString;
        $startPage = max(1, $page - 2);
        $endPage = min($totalPage, $page + 2);
        $this->data['forward']['startPage'] = $startPage;
        $this->data['forward']['endPage'] = $endPage;
        $this->data["view"] = $this->view(_ADMIN, 'brands/index');
        return $this->layout("admin_layout", $this->data);
    }
}
