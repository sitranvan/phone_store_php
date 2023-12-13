<?php

namespace App\Model;

use App\Core\Model;

class Category extends Model
{
    private $table = 'categories';

    public function getAllCategory($search = '', $page = 1)
    {
        $condition = " WHERE 1";

        if (!empty($search)) {
            $condition .= " AND name LIKE '%$search%'";
        }
        // perPage = 8
        $perPage = 8;

        // Calculate offset for pagination
        $offset = ($page - 1) * $perPage;

        // Adding LIMIT/OFFSET clauses for pagination
        $condition .= " ORDER BY created_at DESC LIMIT $perPage OFFSET $offset";
        return $this->getAll($this->table, $condition);
    }

    public function createCategory($dataInsert)
    {
        return $this->insert($this->table, $dataInsert);
    }
    public function checkExists($condition = '')
    {
        return $this->exists($this->table, $condition);
    }
    public function getCategory($id)
    {
        return $this->get($this->table, "WHERE id=$id");
    }
    public function updateCategory($dataUpdate, $id)
    {
        $condition = "id=$id";
        return $this->update($this->table, $dataUpdate, $condition);
    }
    public function deleteCategory($id)
    {
        return $this->delete($this->table, "id=$id");
    }
}
