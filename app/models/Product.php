<?php

namespace App\Model;

use App\Core\Model;

class Product extends Model
{
    private $table = "products";
    private $totalPage = 0;

    public function createProduct($dataInsert)
    {
        return $this->insert($this->table, $dataInsert);
    }

    public function updateProduct($dataUpdate, $id)
    {
        $condition = "id=$id";
        return $this->update($this->table, $dataUpdate, $condition);
    }

    public function getAllProduct($search = '', $active = '', $category = '', $brand = '', $sort = 'desc', $page = 1)
    {
        $condition = " WHERE 1";

        if (!empty($search)) {
            $condition .= " AND name LIKE '%$search%'";
        }

        if ($active == 1 || $active == 0) {
            $condition .= " AND active = '$active'";
        }

        if (!empty($category) && $category !== 'all') {
            $condition .= " AND category_id = '$category'";
        }

        if (!empty($brand) && $brand !== 'all') {
            $condition .= " AND brand_id = '$brand'";
        }

        // perPage = 3
        $perPage = 3;

        // Calculate offset for pagination
        $offset = ($page - 1) * $perPage;

        // Adding ORDER BY and LIMIT/OFFSET clauses for sorting and pagination
        $condition .= " ORDER BY created_at $sort LIMIT $perPage OFFSET $offset";

        return $this->getAll($this->table, $condition);
    }


    public function getProduct($id)
    {
        return $this->get($this->table, "WHERE id=$id");
    }

    public function deleteProduct($id)
    {
        return $this->delete($this->table, "id=$id");
    }
}
