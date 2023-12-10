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

    public function getAllProduct()
    {
        return $this->getAll($this->table);
    }
}
