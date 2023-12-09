<?php

namespace App\Model;

use App\Core\Model;

class UserSession extends Model
{
    protected  $table = 'user_sessions';
    public function insertUserSession($data = [])
    {
        return $this->insert($this->table, $data);
    }
    public function checkExists($condition = '')
    {

        return $this->exists($this->table, $condition);
    }
    public function deleteUserSession($condition = '')
    {
        return $this->delete($this->table, $condition);
    }
}
