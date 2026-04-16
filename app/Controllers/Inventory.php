<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
    public function index()
    {
        // Direct model usage - no initController needed
        $productModel = model('ProductModel');
        $data = [
            'lowStock' => $productModel->where('stock <=', 10)->findAll(),
            'totalStock' => $productModel->selectSum('stock')->first()['stock'] ?? 0,
            'productsCount' => $productModel->countAll()
        ];
        
        return view('inventory/index', $data);
    }
}