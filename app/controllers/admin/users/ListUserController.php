<?php

use App\Core\Controller;
use App\Core\Request;
use App\Model\User;

class ListUserController extends Controller
{
    private $data = [];
    private $user;
    public function __construct()
    {
        $this->user = new User();
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
        $allUser = $this->user->getAllUser($search, $page);


        $this->data['forward']['allUser'] = $allUser;
        $this->data['forward']['allQuery'] = $allQuery;
        $this->data["title"] = "Quản lý người dùng";
        $this->data["view"] = $this->view(_ADMIN, "users/index");
        return $this->layout("admin_layout", $this->data);
    }
}
