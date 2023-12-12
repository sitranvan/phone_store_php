<?php

use App\Core\Controller;
use App\Core\Request;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;

class ListProductController extends Controller
{
    private $data = [];
    private $product;
    private $category;
    private $brand;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->brand = new Brand();
    }
    public function index()
    {
        $request = new Request();
        $allCategory = $this->category->getAllCategory();
        $allBrand = $this->brand->getAllBrand();
        $this->data['forward']['allCategory'] = $allCategory;
        $this->data['forward']['allBrand'] = $allBrand;

        // Lọc
        if ($request->isGet()) {
            if ($request->isGet()) {
                $allQuery = $request->getAll();
                $search = $request->get('search');
                $active = $request->get('active');
                $category = $request->get('category');
                $brand = $request->get('brand');
                $sort = $request->get('sort', 'desc');
                $page = $request->get('page', 1);
            }
        }
        // Xử lí khi tìm kiếm hoặc lọc sau đó bấm phân trang thì sẽ mất đi lọc và phân trang
        $urlParams = [
            'search' => $search,
            'active' => $active,
            'category' => $category,
            'brand' => $brand,
            'sort' => $sort,
            'page' => $page,

        ];
        $queryString = http_build_query($urlParams);

        $allProduct = $this->product->getAllProduct($search, $active, $category, $brand, $sort, $page);


        $totalPage = count($allProduct);

        $this->data["title"] = "Danh sách sản phẩm";
        $this->data['view'] = $this->view(_ADMIN, 'products/index');
        $this->data['forward']['allProduct'] = $allProduct;
        $this->data['forward']['totalPage'] = $totalPage;
        $this->data['forward']['queryString'] = $queryString;
        $this->data['forward']['page'] = $page;
        $startPage = max(1, $page - 2);
        $endPage = min($totalPage, $page + 2);
        $this->data['forward']['startPage'] = $startPage;
        $this->data['forward']['endPage'] = $endPage;
        $this->data['forward']['allQuery'] = $allQuery;
        return $this->layout("admin_layout", $this->data);
    }
}
