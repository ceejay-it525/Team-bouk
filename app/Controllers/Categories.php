<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;
use App\Models\LogModel;

class Categories extends Controller
{
    public function index()
    {
        return view('categories/index');
    }

    public function datatable()
    {
        $request = service('request');
        $model = new CategoryModel();

        $draw = intval($this->request->getPost('draw'));
        $start = intval($this->request->getPost('start'));
        $length = intval($this->request->getPost('length'));
        $searchValue = $this->request->getPost('search')['value'] ?? '';

        // Total records
        $totalRecords = $model->countAll();

        // Filtered records
        $builder = $model->select('categories.*, 
            COALESCE((SELECT COUNT(*) FROM products WHERE products.category = categories.name), 0) as product_count,
            COALESCE((SELECT SUM(products.price * products.stock) FROM products WHERE products.category = categories.name), 0) as stock_value')
            ->like('name', $searchValue);

        $filteredRecords = $builder->countAllResults(false);
        $categories = $builder->findAll($length, $start);

        $data = [];
        $counter = $start + 1;
        foreach ($categories as $row) {
            $rowData = [
                'DT_RowIndex' => $counter++,
                'id' => $row['id'],
                'name' => $row['icon'] . ' ' . $row['name'],
                'icon' => $row['icon'],
                'description' => substr($row['description'], 0, 50) . '...',
                'product_count' => $row['product_count'],
                'stock_value' => '$' . number_format($row['stock_value'], 2),
                'status' => $row['status'],
                'created_at' => date('M d, Y', strtotime($row['created_at'])),
                'action' => '
                    <div class="btn-group">
                        <button class="btn btn-sm btn-warning edit-category" data-id="' . $row['id'] . '">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete-category" data-id="' . $row['id'] . '">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>'
            ];
            $data[] = $rowData;
        }

        return $this->response->setJSON([
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }

    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[2]|is_unique[categories.name,id,{id}]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $validation->getErrors()
            ]);
        }

        $categoryModel = new CategoryModel();
        $logModel = new LogModel();

        $data = [
            'name'        => $this->request->getPost('name'),
            'icon'        => $this->request->getPost('icon') ?: '',
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status') ?: 'Active'
        ];

        if ($categoryModel->insert($data)) {
            $logModel->addLog('New Category added: ' . $data['name'], 'ADD');
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Category created successfully!'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to create category'
            ]);
        }
    }

    public function update()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[2]|is_unique[categories.name,id,' . $this->request->getPost('id') . ']'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $validation->getErrors()
            ]);
        }

        $model = new CategoryModel();
        $logModel = new LogModel();
        $categoryId = $this->request->getPost('id');

        $categoryData = [
            'name'        => $this->request->getPost('name'),
            'icon'        => $this->request->getPost('icon'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status')
        ];

        if ($model->update($categoryId, $categoryData)) {
            $logModel->addLog('Category updated: ' . $categoryData['name'], 'UPDATED');
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Category updated successfully!'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error updating category.'
            ]);
        }
    }

    public function edit($id)
    {
        $model = new CategoryModel();
        $category = $model->find($id);

        if ($category) {
            return $this->response->setJSON(['data' => $category]);
        } else {
            return $this->response->setStatusCode(404)
                ->setJSON(['error' => 'Category not found']);
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $model = new CategoryModel();
        $logModel = new LogModel();
        
        $category = $model->find($id);
        if (!$category) {
            return $this->response->setJSON([
                'success' => false, 
                'message' => 'Category not found.'
            ]);
        }

        // Check if category has products
        $productModel = new \App\Models\ProductModel();
        $productCount = $productModel->where('category', $category['name'])->countAll();
        
        if ($productCount > 0) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Cannot delete category with ' . $productCount . ' products!'
            ]);
        }

        if ($model->delete($id)) {
            $logModel->addLog('Category deleted: ' . $category['name'], 'DELETED');
            return $this->response->setJSON([
                'success' => true, 
                'message' => 'Category deleted successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to delete category.'
            ]);
        }
    }
}