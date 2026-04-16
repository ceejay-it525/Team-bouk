<?php

    namespace App\Controllers;

    use App\Models\PurchaseOrderModel;
    use CodeIgniter\Controller;
    use App\Models\LogModel;
use App\Models\SupplierModel;

    class PurchaseOrders extends Controller
    {
        public function index()
        {
            $model = new SupplierModel();
            $data['purchaseOrders'] = $model->findAll();
            return view('purchase_orders/index', $data);
        }

        public function save()
        {
            $supplier_id = $this->request->getPost('supplier_id');
            $product_id = $this->request->getPost('product_id');
            $quantity = $this->request->getPost('quantity');
            $price = $this->request->getPost('price');
            $total = $quantity * $price;
            $invoice_no = $this->request->getPost('invoice_no');
            $date_received = date('Y-m-d');

            $purchaseModel = new SupplierModel();
            $logModel = new LogModel();

            $data = [
                'supplier_id'   => $supplier_id,
                'product_id'    => $product_id,
                'quantity'      => $quantity,
                'unit_price'    => $price,
                'total_amount'  => $total,
                'invoice_no'    => $invoice_no,
                'date_received' => $date_received,
                'status'        => 'Received'
            ];

            if ($purchaseModel->insert($data)) {
                // Update product stock
                $productModel = new \App\Models\SupplierModel();
                $productModel->where('id', $product_id)
                            ->set('stock', 'stock + ' . $quantity, false)
                            ->update();
                
                $logModel->addLog('Stock In: ' . $quantity . ' units (Invoice: ' . $invoice_no . ')', 'STOCK_IN');
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save purchase order']);
            }
        }

        public function update()
        {
            $model = new SupplierModel();
            $logModel = new LogModel();
            $orderId = $this->request->getPost('id');
            $supplier_id = $this->request->getPost('supplier_id');
            $product_id = $this->request->getPost('product_id');
            $quantity = $this->request->getPost('quantity');
            $price = $this->request->getPost('price');
            $total = $quantity * $price;
            $invoice_no = $this->request->getPost('invoice_no');

            $orderData = [
                'supplier_id'   => $supplier_id,
                'product_id'    => $product_id,
                'quantity'      => $quantity,
                'unit_price'    => $price,
                'total_amount'  => $total,
                'invoice_no'    => $invoice_no
            ];

            $updated = $model->update($orderId, $orderData);

            if ($updated) {
                $logModel->addLog('Purchase Order updated: ' . $invoice_no, 'UPDATED');
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Purchase order updated successfully.'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error updating purchase order.'
                ]);
            }
        }

        public function edit($id)
        {
            $model = new SupplierModel();
            $order = $model->find($id);

            if ($order) {
                return $this->response->setJSON(['data' => $order]);
            } else {
                return $this->response->setStatusCode(404)->setJSON(['error' => 'Order not found']);
            }
        }

        public function delete($id)
        {
            $model = new SupplierModel();
            $logModel = new LogModel();
            $order = $model->find($id);
            
            if (!$order) {
                return $this->response->setJSON(['success' => false, 'message' => 'Order not found.']);
            }

            // Reverse stock
            $productModel = new \App\Models\SupplierModel();
            $productModel->where('id', $order['product_id'])
                        ->set('stock', 'stock - ' . $order['quantity'], false)
                        ->update();

            $deleted = $model->delete($id);

            if ($deleted) {
                $logModel->addLog('Purchase Order deleted: ' . $order['invoice_no'], 'DELETED');
                return $this->response->setJSON(['success' => true, 'message' => 'Order deleted & stock reversed.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete order.']);
            }
        }

        public function fetchRecords()
        {
            $request = service('request');
            $model = new SupplierModel();

            $start = $request->getPost('start') ?? 0;
            $length = $request->getPost('length') ?? 10;
            $searchValue = $request->getPost('search')['value'] ?? '';

            $totalRecords = $model->countAll();
            $result = $model->getRecords($start, $length, $searchValue);

            $data = [];
            $counter = $start + 1;
            foreach ($result['data'] as $row) {
                $row['row_number'] = $counter++;
                $row['total_amount'] = 'Rp ' . number_format($row['total_amount'], 0, ',', '.');
                $data[] = $row;
            }

            return $this->response->setJSON([
                'draw' => intval($request->getPost('draw')),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $result['filtered'],
                'data' => $data,
            ]);
        }
    }