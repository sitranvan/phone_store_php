<?php

namespace App\Model;

use App\Core\Model;

class OrderDetail extends Model
{
    private $table = "order_details";
    public function createOrderDetail($dataInsert)
    {
        return $this->insert($this->table, $dataInsert);
    }
    public function deleteProductOrder($orderId)
    {
        $condition = "order_id = $orderId";
        return $this->delete($this->table, $condition);
    }

    public function updateOrderDetail($dataUpdate, $orderId)
    {
        $condition = "order_id = $orderId";
        return $this->update($this->table, $dataUpdate, $condition);
    }

    public function getAllOrderDetail($orderId)
    {
        return $this->getAllBySql("SELECT * FROM $this->table WHERE order_id = $orderId");
    }
    public function getAllMyOrderProduct($orderId)
    {
        return $this->getAllBySql("SELECT products.name AS product_name,$this->table.*  FROM $this->table JOIN products ON {$this->table}.product_id = products.id WHERE order_id = $orderId");
    }
}
