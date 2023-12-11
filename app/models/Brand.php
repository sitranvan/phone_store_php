<?php

namespace App\Model;

use App\Core\Model;

class Brand extends Model
{
    private $table = 'brands';

    public function getAllBrand()
    {
        return $this->getAll($this->table);
    }
}
