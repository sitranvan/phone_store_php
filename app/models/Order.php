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


    public function getMyOrder($orderId)
    {
        $login = new Login();
        $userId = $login->getUser()['id'];
        return $this->getBySql("SELECT * FROM $this->table WHERE user_id = $userId AND id=$orderId");
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
