<?php

use App\Core\Controller;
use App\Model\Users;


class HomeController extends Controller
{
    private $users;
    private $data = [];

    public function __construct()
    {
    }

    public function index()
    {
        $this->data['title'] = 'Trang chủ';
        $this->data['view'] = $this->view(_CLENTS, 'home/index');

        return $this->layout('client_layout', $this->data);
    }

    public function detail()
    {
        $this->data['title'] = 'Chi tiết';
        $this->data['view'] = $this->view(_CLENTS, 'home/detail');
        return $this->layout('client_layout', $this->data);
    }
}
