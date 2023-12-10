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
}
