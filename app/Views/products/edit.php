<!-- app/Views/products/edit.php -->

<h2>Edit Product</h2>

<form method="post" action="/products/update/<?= $product['id'] ?>">
    <input type="text" name="name" value="<?= $product['name'] ?>"><br>
    <input type="number" name="price" value="<?= $product['price'] ?>"><br>
    <input type="number" name="stock" value="<?= $product['stock'] ?>"><br>
    <input type="text" name="category" value="<?= $product['category'] ?>"><br>

    <button type="submit">Update</button>
</form>