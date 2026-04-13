<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'price', 'stock', 'category', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getFilteredData($searchValue, $start, $length)
    {
        $builder = $this->builder();

        if (!empty($searchValue)) {
            $builder->groupStart()
                   ->like('name', $searchValue)
                   ->orLike('category', $searchValue)
                   ->groupEnd();
        }

        $filteredTotal = $builder->countAllResults(false);
        
        $builder->select('id, name, price, stock, category');
        $data = $builder->limit($length, $start)
                       ->orderBy('id', 'DESC')
                       ->get()
                       ->getResultArray();

        // Format price for display in DataTable
        foreach ($data as &$row) {
            $row['price'] = 'Rp ' . number_format($row['price'], 0, ',', '.');
        }

        return [
            'data' => $data,
            'filtered' => $filteredTotal
        ];
    }
}