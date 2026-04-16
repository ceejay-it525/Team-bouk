<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'description',
        'status'
    ];

    public function getRecords($start, $length, $search)
    {
        $builder = $this;

        if (!empty($search)) {
            $builder = $builder->like('name', $search);
        }

        $filtered = $builder->countAllResults(false);
        $data = $builder->findAll($length, $start);

        return [
            'filtered' => $filtered,
            'data' => $data
        ];
    }
}