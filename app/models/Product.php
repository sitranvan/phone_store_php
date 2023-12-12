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

    public function getAllProduct($search = '', $active = '', $category = '', $brand = '', $sort = 'desc', $page = 1, $priceSort = 'all')
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

        // Adding sorting condition for price if it's not 'all'
        if ($priceSort !== 'all') {

            if ($priceSort === 'asc' || $priceSort === 'desc') {
                $condition .= " ORDER BY price $priceSort, created_at $sort";
            } else {
                $condition .= " ORDER BY created_at $sort";
            }
        } else {
            // If priceSort is 'all', don't apply price sorting
            $condition .= " ORDER BY created_at $sort";
        }

        // perPage = 8
        $perPage = 8;

        // Calculate offset for pagination
        $offset = ($page - 1) * $perPage;

        // Adding LIMIT/OFFSET clauses for pagination
        $condition .= " LIMIT $perPage OFFSET $offset";

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
