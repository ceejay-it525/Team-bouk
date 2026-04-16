<?php

namespace App\Controllers;

use App\Models\PurchaseOrderModel;
use App\Models\ProductModel;
use App\Models\SupplierModel;

class PurchaseOrders extends BaseController
{
    public function index()
    {
        $purchaseModel = new PurchaseOrderModel();

        $data['purchases'] = $purchaseModel
            ->select('purchase_orders.*, suppliers.name as supplier_name, products.name as product_name')
            ->join('suppliers', 'suppliers.id = purchase_orders.supplier_id')
            ->join('products', 'products.id = purchase_orders.product_id')
            ->findAll();

        return view('purchase_orders/index', $data);
    }

    public function save()
    {
        $model = new PurchaseOrderModel();
        $productModel = new ProductModel();

        $quantity = $this->request->getPost('quantity');

        $data = [
            'supplier_id'  => $this->request->getPost('supplier_id'),
            'product_id'   => $this->request->getPost('product_id'),
            'quantity'     => $quantity,
            'unit_price'   => $this->request->getPost('price'),
            'total_amount' => $quantity * $this->request->getPost('price'),
            'invoice_no'   => $this->request->getPost('invoice_no'),
            'status'       => 'Received'
        ];

        if ($model->insert($data)) {
            // update stock
            $productModel->where('id', $data['product_id'])
                ->set('stock', 'stock + ' . $quantity, false)
                ->update();

            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'error']);
    }
}