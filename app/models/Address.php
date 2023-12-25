<?php

namespace App\Model;

use App\Core\Model;

class Address extends Model
{
    private $table = "addresses";

    public function updateAddress($dataUpdate, $id)
    {
        $condition = "user_id=$id";
        return $this->update($this->table, $dataUpdate, $condition);
    }
}
