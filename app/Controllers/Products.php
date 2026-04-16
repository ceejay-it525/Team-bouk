<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class Products extends BaseController
{
    public function index()
    {
        $model = new ProductsModel();
        $data['products'] = $model->findAll();

        return view('products/index', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $model = new ProductsModel();

        $model->save([
            'name'     => $this->request->getPost('name'),
            'price'    => $this->request->getPost('price'),
            'stock'    => $this->request->getPost('stock'),
            'category' => $this->request->getPost('category'),
        ]);

        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $model = new ProductsModel();
        $data['product'] = $model->find($id);

        return view('products/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductsModel();

        $model->update($id, [
            'name'     => $this->request->getPost('name'),
            'price'    => $this->request->getPost('price'),
            'stock'    => $this->request->getPost('stock'),
            'category' => $this->request->getPost('category'),
        ]);

        return redirect()->to('/products');
    }

    public function delete($id)
    {
        $model = new ProductsModel();
        $model->delete($id);

        return redirect()->to('/products');
    }
}