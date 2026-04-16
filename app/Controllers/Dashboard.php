<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\SupplierModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $products = new ProductsModel();
        $suppliers = new SupplierModel();
        $categories = new CategoryModel();

        $data = [
            'totalProducts'  => $products->countAll(),

            // FIXED: stock instead of quantity
            'lowStock'       => (new ProductsModel())
                                ->where('stock <', 5)
                                ->countAllResults(),

            'totalSuppliers' => $suppliers->countAll(),
            'totalCategories'=> $categories->countAll(),
        ];

        return view('dashboard', $data);
    }
}