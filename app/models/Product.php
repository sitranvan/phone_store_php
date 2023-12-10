<?php

namespace App\Model;

use App\Core\Model;

class Product extends Model
{
    private $table = "products";

    public function createProduct($dataInsert)
    {
        return $this->insert($this->table, $dataInsert);
    }

    public function updateProduct($dataUpdate, $id)
    {
        $condition = "id=$id";
        return $this->update($this->table, $dataUpdate, $condition);
    }

    public function getAllProduct()
    {
        return $this->getAll($this->table);
    }

    public function getProduct($id)
    {
        return $this->get($this->table, "WHERE id=$id");
    }

    public function deleteProduct($id)
    {
        return $this->delete($this->table, "id=$id");
    }
}
