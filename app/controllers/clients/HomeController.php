<?php

use App\Core\Controller;
use App\Core\Request;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;



class HomeController extends Controller
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
        $request = new Request();
        $allCategory = $this->category->getAllCategory();
        $allBrand = $this->brand->getAllBrand();
        $this->data['forward']['allCategory'] = $allCategory;
        $this->data['forward']['allBrand'] = $allBrand;
        if ($request->isGet()) {
            if ($request->isGet()) {
                $allQuery = $request->getAll();
                $search = $request->get('search');
                $active = $request->get('active');
                $category = $request->get('category');
                $brand = $request->get('brand');
                $sort = $request->get('sort', 'desc');
                $page = $request->get('page', 1);
                $priceSort = $request->get('priceSort', 'all');
            }
        }


        $allProduct = $this->product->getAllProduct($search, $active, $category, $brand, $sort, $page, $priceSort);
        $this->data['forward']['allQuery'] = $allQuery;

        $totalPage = count($allProduct);

        $this->data['forward']['totalPage'] = $totalPage;
        $this->data['forward']['page'] = $page;
        $startPage = max(1, $page - 2);
        $endPage = min($totalPage, $page + 2);
        $this->data['forward']['startPage'] = $startPage;
        $this->data['forward']['endPage'] = $endPage;


        $this->data['title'] = 'Trang chủ';
        $this->data['view'] = $this->view(_CLENTS, 'home/index');
        $this->data['forward']['allProduct'] = $allProduct;
        return $this->layout('client_layout', $this->data);
    }

    public function detail()
    {
        $this->data['title'] = 'Chi tiết';
        $this->data['view'] = $this->view(_CLENTS, 'home/detail');
        return $this->layout('client_layout', $this->data);
    }
}
