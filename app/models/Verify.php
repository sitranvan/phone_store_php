<?php

namespace App\Model;

use App\Core\Model;

class Verify extends Model
{
    protected  $table = 'verifies';

    public function insertVerify($data = [])
    {
        return $this->insert($this->table, $data);
    }
    public function updateVerify($data = [], $condition = '')
    {
        return $this->update($this->table, $data, $condition);
    }
    public function getVerify($condition)
    {
        return $this->get($this->table, 'WHERE ' . $condition);
    }
}
