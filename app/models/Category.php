<?php

namespace App\Model;

use App\Core\Model;

class Category extends Model
{
    private $table = 'categories';

    public function getAllCategory()
    {
        return $this->getAll($this->table);
    }

    public function createCategory($dataInsert)
    {
        return $this->insert($this->table, $dataInsert);
    }
    public function checkExists($condition = '')
    {
        return $this->exists($this->table, $condition);
    }
}
