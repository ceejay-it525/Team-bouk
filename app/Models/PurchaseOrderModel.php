<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseOrderModel extends Model
{
    protected $table = 'purchase_orders';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'supplier_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_amount',
        'invoice_no',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}