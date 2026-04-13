<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class Products extends BaseController
{
    protected $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
    }

    public function index()
    {
        return view('Products/index');
    }

    public function datatables()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['error' => 'AJAX request only']);
        }

        $request = $this->request;
        $draw = intval($request->getPost('draw'));  // ✅ FIXED: $requestproducts → $request
        $start = intval($request->getPost('start'));
        $length = intval($request->getPost('length'));
        $searchValue = trim($request->getPost('search')['value'] ?? '');

        $totalRecords = $this->productsModel->countAll();
        $result = $this->productsModel->getFilteredData($searchValue, $start, $length);
        
        return $this->response->setJSON([
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $result['filtered'],
            'data' => $result['data']
        ]);
    }

    public function save()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'AJAX request only']);
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[255]',
            'price' => 'required|numeric|greater_than[0]',
            'stock' => 'required|integer|greater_than_equal_to[0]',
            'category' => 'required|min_length[2]|max_length[100]'
        ]);

        if (!$validation->run($this->request->getPost())) {
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => $validation->getErrors()
            ]);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'price' => floatval($this->request->getPost('price')),
            'stock' => intval($this->request->getPost('stock')),
            'category' => $this->request->getPost('category')
        ];

        $id = $this->request->getPost('id');

        if ($id) {
            $data['updated_at'] = date('Y-m-d H:i:s');
            $success = $this->productsModel->update($id, $data);
            $message = 'Product updated successfully!';
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $success = $this->productsModel->insert($data);
            $message = 'Product added successfully!';
        }

        if ($success) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => $message
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Failed to save product!'
        ]);
    }

    public function delete()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'AJAX request only']);
        }

        $id = $this->request->getPost('id');
        if (!$id || !$this->productsModel->delete($id)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete product!'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Product deleted successfully!'
        ]);
    }

    public function getProduct($id = null)
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'AJAX request only']);
        }

        $product = $this->productsModel->find($id);
        if ($product) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $product
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Product not found!'
        ]);
    }
}