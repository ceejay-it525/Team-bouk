<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'inventory_logs';
    protected $allowedFields = [
        'product_id',
        'type',
        'quantity',
        'balance_after',
        'reason',
        'created_by'
    ];
}