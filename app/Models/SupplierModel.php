<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'contact_person',
        'phone',
        'email',
        'address',
        'status'
    ];

    public function getRecords($start, $length, $search)
    {
        $builder = $this;

        if (!empty($search)) {
            $builder = $builder->like('name', $search)
                               ->orLike('email', $search);
        }

        $filtered = $builder->countAllResults(false);
        $data = $builder->findAll($length, $start);

        return [
            'filtered' => $filtered,
            'data' => $data
        ];
    }
}