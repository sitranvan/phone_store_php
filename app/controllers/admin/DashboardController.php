<?php

use App\Core\Controller;


class DashboardController extends Controller
{
    private $data = [];
    public function index()
    {
        $this->data['title'] = 'Admin';
        $this->data['view'] = $this->view(_ADMIN, 'dashboard/index');
        return $this->layout('admin_layout', $this->data);
    }
}
