<?php

namespace App\Model;

use App\Classes\Login;
use App\Core\Model;

class Order extends Model
{
    private $table = "orders";

    public function createOrder($dataInsert)
    {
        return $this->insert($this->table, $dataInsert);
    }

    public function updateOrder($dataUpdate, $id)
    {
        $condition = "id=$id";
        return $this->update($this->table, $dataUpdate, $condition);
    }
    public function getAllOrder()
    {
        return $this->getAllBySql("SELECT *,orders.status AS order_status, orders.id AS order_id FROM {$this->table} JOIN users ON users.id = {$this->table}.user_id");
    }

    public function getOrder($orderId)
    {
        return $this->getBySql("SELECT *,orders.status AS order_status FROM {$this->table} JOIN users ON users.id = {$this->table}.user_id JOIN addresses ON users.id = addresses.user_id WHERE orders.id=$orderId");
    }

    public function getMyOrder($orderId)
    {
        $login = new Login();
        $userId = $login->getUser()['id'];
        return $this->getBySql("SELECT *, orders.status AS order_status FROM {$this->table} JOIN users ON users.id = {$this->table}.user_id JOIN addresses ON users.id = addresses.user_id WHERE orders.user_id = $userId AND orders.id=$orderId");
    }

    public function getLastInsertId()
    {
        return $this->lastInsertId();
    }

    public function getAllMyOrder()
    {
        $login = new Login();
        $userId = $login->getUser()['id'];
        return $this->getAllBySql("SELECT * FROM $this->table  WHERE user_id = $userId");
    }
}
