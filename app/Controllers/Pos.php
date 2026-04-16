public function checkout()
{
    $cart = $this->request->getPost('cart');

    $saleModel = new \App\Models\SaleModel();
    $productModel = new \App\Models\ProductModel();

    $saleId = $saleModel->insert([
        'sale_no' => uniqid('SALE'),
        'total_amount' => 0
    ]);

    $total = 0;

    foreach ($cart as $item) {
        $product = $productModel->find($item['id']);

        $lineTotal = $product['price'] * $item['qty'];
        $total += $lineTotal;

        $productModel->update($item['id'], [
            'quantity' => $product['quantity'] - $item['qty']
        ]);
    }

    $saleModel->update($saleId, [
        'total_amount' => $total
    ]);

    return $this->response->setJSON([
        'status' => 'success',
        'sale_id' => $saleId
    ]);
}