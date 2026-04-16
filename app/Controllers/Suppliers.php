<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Suppliers extends BaseController
{
    public function index()
    {
        $model = new SupplierModel();

        $data = [
            'suppliers' => $model->findAll()
        ];

        return view('suppliers/index', $data);
    }

    public function create()
    {
        return view('suppliers/create');
    }

    public function store()
    {
        $model = new SupplierModel();

        $model->save([
            'name'            => $this->request->getPost('name'),
            'contact_person'  => $this->request->getPost('contact_person'),
            'phone'           => $this->request->getPost('phone'),
            'email'           => $this->request->getPost('email'),
            'city'            => $this->request->getPost('city'),
            'address'         => $this->request->getPost('address'),
            'status'          => $this->request->getPost('status') ?? 'Active',
        ]);

        return redirect()->to(base_url('suppliers'));
    }

    public function edit($id)
    {
        $model = new SupplierModel();

        $data = [
            'supplier' => $model->find($id)
        ];

        return view('suppliers/edit', $data);
    }

    public function update($id)
    {
        $model = new SupplierModel();

        $model->update($id, [
            'name'            => $this->request->getPost('name'),
            'contact_person'  => $this->request->getPost('contact_person'),
            'phone'           => $this->request->getPost('phone'),
            'email'           => $this->request->getPost('email'),
            'city'            => $this->request->getPost('city'),
            'address'         => $this->request->getPost('address'),
            'status'          => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('suppliers'));
    }

    public function delete($id)
    {
        $model = new SupplierModel();
        $model->delete($id);

        return redirect()->to(base_url('suppliers'));
    }
}