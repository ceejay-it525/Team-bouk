<!-- app/Views/products/create.php -->

<h2>Add Product</h2>

<form method="post" action="/products/store">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="number" name="price" placeholder="Price"><br>
    <input type="number" name="stock" placeholder="Stock"><br>
    <input type="text" name="category" placeholder="Category"><br>

    <button type="submit">Save</button>
</form>