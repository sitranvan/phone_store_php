<?php

namespace App\Core;

use App\Core\DataBase;

class Model extends DataBase
{

    public function get($table, $condition, $fieldArray = ['*'])
    {
        $fieldList = implode(',', $fieldArray);
        return $this->fetchDB("SELECT $fieldList FROM $table $condition");
    }
    public function getAll($table = '', $fieldArray = ['*'])
    {
        $fieldList = implode(',', $fieldArray);
        return $this->fetchAllDB("SELECT $fieldList FROM $table");
    }
    public function lastInsertId()
    {
        return $this->lastInsertIdDB();
    }
    public function insert($table = '', $data = [])
    {
        return $this->insertDB($table, $data);
    }

    public function delete($table = '', $condition = '')
    {
        return $this->deleteDB($table, $condition);
    }
    public function update($table = '', $data = [], $condition = '')
    {
        return $this->updateDB($table, $data, $condition);
    }

    public function exists($table = '', $condition = '')
    {
        return $this->existsDB("SELECT id FROM $table WHERE $condition");
    }
}
