<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SupplierModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $products = new ProductModel();
        $suppliers = new SupplierModel();
        $categories = new CategoryModel();

        $data = [
            'totalProducts'  => $products->countAll(),
            'lowStock'       => $products->where('quantity <', 5)->countAllResults(),
            'totalSuppliers' => $suppliers->countAll(),
            'totalCategories'=> $categories->countAll(),
        ];

        return view('dashboard', $data);
    }
}