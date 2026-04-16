<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'price',
        'stock',
        'category'
    ];

    // Optional: return data as array
    protected $returnType = 'array';

    // Optional timestamps (enable if your table has created_at/updated_at)
    protected $useTimestamps = false;

    /*
    If you want timestamps later, use:
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    */
}