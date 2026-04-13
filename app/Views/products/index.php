<?php

namespace App\Controllers;

use App\Models\productsModel;

class productss extends BaseController
{
    protected $productssModel;

    public function __construct()
    {
        $this->productssModel = new productsModel();
    }

    public function datatables()
    {
        if ($this->request->isAJAX()) {
            $request = $this->request;
            $draw = intval($request->getPost('draw'));
            $start = intval($request->getPost('start'));
            $length = intval($request->getPost('length'));
            $searchValue = $request->getPost('search')['value'] ?? '';

            // Total records without filtering
            $total = $this->productssModel->countAll();

            // Filter records
            $result = $this->productssModel->getFilteredData($searchValue, $start, $length);
            $data = $result['data'];
            $filteredTotal = $result['filtered'];

            return $this->response->setJSON([
                'draw' => $draw,
                'recordsTotal' => $total,
                'recordsFiltered' => $filteredTotal,
                'data' => $data
            ]);
        }
    }

    public function index()
    {
        return view('productss/index');
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            
            $rules = [
                'name' => 'required|min_length[3]',
                'price' => 'required|numeric|greater_than[0]',
                'stock' => 'required|integer|greater_than_equal_to[0]',
                'category' => 'required|min_length[2]'
            ];

            if (!$validation->setRules($rules)->run($this->request->getPost())) {
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
                // Update existing products
                $data['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->productssModel->update($id, $data);
                $message = 'products updated successfully!';
            } else {
                // Create new products
                $data['created_at'] = date('Y-m-d H:i:s');
                $result = $this->productssModel->insert($data);
                $message = 'products added successfully!';
            }

            if ($result) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => $message
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to save products!'
                ]);
            }
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            
            if ($this->productssModel->delete($id)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'products deleted successfully!'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to delete products!'
                ]);
            }
        }
    }

    public function getproducts($id)
    {
        if ($this->request->isAJAX()) {
            $products = $this->productssModel->find($id);
            
            if ($products) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'data' => $products
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'products not found!'
                ]);
            }
        }
    }
}