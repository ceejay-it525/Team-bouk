<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">

  <!-- HEADER -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><i class="fas fa-box"></i> Products</h1>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTENT -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">

        <!-- CARD HEADER -->
        <div class="card-header">
          <h3 class="card-title">All Products</h3>

          <button class="btn btn-primary btn-sm float-right"
                  data-toggle="modal"
                  data-target="#addModal">
            <i class="fas fa-plus"></i> Add Product
          </button>
        </div>

        <!-- TABLE -->
        <div class="card-body">
          <table class="table table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>
              <?php if (!empty($products)) : ?>
                <?php foreach ($products as $i => $p) : ?>
                  <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($p['name']) ?></td>
                    <td><?= esc($p['category']) ?></td>
                    <td>₱<?= number_format($p['price'], 2) ?></td>

                    <td>
                      <?php if ($p['stock'] <= 5): ?>
                        <span class="text-danger font-weight-bold">
                          <?= $p['stock'] ?> (Low)
                        </span>
                      <?php else: ?>
                        <?= $p['stock'] ?>
                      <?php endif; ?>
                    </td>

                    <td><?= $p['created_at'] ?? '-' ?></td>

                    <td>
                      <button class="btn btn-warning btn-sm editBtn"
                        data-id="<?= $p['id'] ?>"
                        data-name="<?= esc($p['name']) ?>"
                        data-category="<?= esc($p['category']) ?>"
                        data-price="<?= $p['price'] ?>"
                        data-stock="<?= $p['stock'] ?>"
                        data-description="<?= esc($p['description'] ?? '') ?>"
                        data-toggle="modal"
                        data-target="#editModal">
                        <i class="fas fa-edit"></i>
                      </button>

                      <a href="<?= base_url('/products/delete/' . $p['id']) ?>"
                         class="btn btn-danger btn-sm"
                         onclick="return confirm('Delete this product?')">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>

                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="7" class="text-center">No products found</td>
                </tr>
              <?php endif; ?>
            </tbody>

          </table>
        </div>

      </div>

    </div>
  </section>

</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog">

    <form action="<?= base_url('/products/store') ?>" method="post">
      <?= csrf_field() ?>

      <div class="modal-content">

        <div class="modal-header bg-success">
          <h5 class="modal-title text-white">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

          <input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>
          <input type="text" name="category" class="form-control mb-2" placeholder="Category" required>
          <input type="number" name="price" class="form-control mb-2" placeholder="Price" required>
          <input type="number" name="stock" class="form-control mb-2" placeholder="Stock" required>

          <textarea name="description" class="form-control" placeholder="Description"></textarea>

        </div>

        <div class="modal-footer">
          <button class="btn btn-success">Save</button>
        </div>

      </div>
    </form>

  </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog">

    <form action="<?= base_url('/products/update') ?>" method="post">
      <?= csrf_field() ?>

      <div class="modal-content">

        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

          <input type="hidden" name="id" id="editId">

          <input type="text" name="name" id="editName" class="form-control mb-2">
          <input type="text" name="category" id="editCategory" class="form-control mb-2">
          <input type="number" name="price" id="editPrice" class="form-control mb-2">
          <input type="number" name="stock" id="editStock" class="form-control mb-2">

          <textarea name="description" id="editDescription" class="form-control"></textarea>

        </div>

        <div class="modal-footer">
          <button class="btn btn-warning">Update</button>
        </div>

      </div>
    </form>

  </div>
</div>

<!-- SCRIPT -->
<script>
$('.editBtn').on('click', function () {
  $('#editId').val($(this).data('id'));
  $('#editName').val($(this).data('name'));
  $('#editCategory').val($(this).data('category'));
  $('#editPrice').val($(this).data('price'));
  $('#editStock').val($(this).data('stock'));
  $('#editDescription').val($(this).data('description'));
});
</script>

<?= $this->endSection() ?>