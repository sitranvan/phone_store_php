<?php

namespace App\Model;

use App\Core\Model;

class User extends Model
{
    protected $table = 'users';

    public function insertUser($data = [])
    {
        return $this->insert($this->table, $data);
    }

    public function getIdInsert()
    {
        return $this->lastInsertId();
    }

    public function updateUser($data = [], $condition = '')
    {
        return $this->update($this->table, $data, $condition);
    }

    public function getUser($condition = '')
    {
        return $this->get($this->table, 'WHERE ' . $condition);
    }

    public function checkExists($condition = '')
    {

        return $this->exists($this->table, $condition);
    }
}
