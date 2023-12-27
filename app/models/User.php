<?php

namespace App\Model;

use App\Classes\Login;
use App\Core\Model;

class User extends Model
{
    protected $table = 'users';


    public function getAllUser($search = '', $page = 1)
    {
        $condition = " WHERE 1";

        if (!empty($search)) {
            $condition .= " AND fullname LIKE '%$search%'";
        }
        // perPage = 8
        $perPage = 8;

        // Calculate offset for pagination
        $offset = ($page - 1) * $perPage;

        // Adding LIMIT/OFFSET clauses for pagination
        $condition .= " ORDER BY users.created_at DESC LIMIT $perPage OFFSET $offset";
        $join = " JOIN roles ON {$this->table}.role_id = roles.id ";
        return $this->getAll($this->table . $join, $condition);
    }


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
    public function deleteUser($id)
    {
        return $this->delete($this->table, "id=$id");
    }

    public function getUser($condition = '')
    {
        return $this->get($this->table, 'WHERE ' . $condition);
    }

    public function checkExists($condition = '')
    {

        return $this->exists($this->table, $condition);
    }
    public function getProfile()
    {
        $login = new Login();
        $id = $login->getUser()['id'];
        return $this->getBySql("SELECT users.*,addresses.*  FROM {$this->table} JOIN addresses ON {$this->table}.id = addresses.user_id WHERE users.id=$id");
    }
}
