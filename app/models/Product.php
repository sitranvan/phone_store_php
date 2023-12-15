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
        // Initial conditions
        $conditions = " WHERE 1";

        // Add search condition
        if (!empty($search)) {
            $conditions .= " AND products.name LIKE '%$search%'";
        }

        // Add active condition
        if ($active == 1 || $active == 0) {
            $conditions .= " AND products.active = '$active'";
        }

        // Add category condition
        if (!empty($category) && $category !== 'all') {
            $conditions .= " AND products.category_id = '$category'";
        }

        // Add brand condition
        if (!empty($brand) && $brand !== 'all') {
            $conditions .= " AND products.brand_id = '$brand'";
        }

        // Join with 'brands' table
        $joinCondition = " LEFT JOIN brands ON products.brand_id = brands.id";

        // perPage = 8
        $perPage = 8;

        // Calculate offset for pagination
        $offset = ($page - 1) * $perPage;

        // Construct the SQL query
        $query = "SELECT products.*, brands.*, products.id AS product_id, products.name AS product_name, brands.name AS brand_name, brands.id AS brand_id FROM products" . $joinCondition . $conditions;
        // Adding sorting condition for price if it's not 'all'
        if ($priceSort !== 'all') {
            if ($priceSort === 'asc' || $priceSort === 'desc') {
                $query .= " ORDER BY products.price $priceSort, products.created_at $sort";
            } else {
                $query .= " ORDER BY products.created_at $sort";
            }
        } else {
            // If priceSort is 'all', don't apply price sorting
            $query .= " ORDER BY products.created_at $sort";
        }

        // Adding LIMIT/OFFSET clauses for pagination
        $query .= " LIMIT $offset, $perPage";

        return $this->getAllBySql($query);
    }


    public function getProduct($id)
    {
        $sql = 'SELECT products.*, brands.*,products.name AS product_name, brands.name AS brand_name, products.id AS product_id, brands.id AS brand_id FROM ' . $this->table . ' JOIN brands ON products.brand_id = brands.id WHERE products.id = ' . $id . '';
        return $this->getBySql($sql);
    }


    public function deleteProduct($id)
    {
        return $this->delete($this->table, "id=$id");
    }
}
