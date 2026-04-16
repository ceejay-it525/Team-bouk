<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><i class="fas fa-box"></i> Products</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Products</h3>
              <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i> Add Product
              </button>
            </div>
            <div class="card-body">
              <table id="productsTable" class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal">
      <div class="modal-dialog">
        <form id="addForm">
          <?= csrf_field() ?>
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h5 class="modal-title text-white"><i class="fas fa-plus"></i> New Product</h5>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Product Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" required>
              </div>
              
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="category" class="form-control" required>
                      <option value="">Select...</option>
                      <option value="Electronics">Electronics</option>
                      <option value="Clothing">Clothing</option>
                      <option value="Books">Books</option>
                      <option value="Home">Home</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Stock <span class="text-danger">*</span></label>
                    <input type="number" name="stock" min="0" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Price <span class="text-danger">*</span></label>
                    <input type="number" name="price" step="0.01" min="0" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="2"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal">
      <div class="modal-dialog">
        <form id="editForm">
          <?= csrf_field() ?>
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h5 class="modal-title text-white"><i class="fas fa-edit"></i> Edit Product</h5>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" id="editId">
              
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" id="editName" class="form-control" required>
              </div>
              
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" id="editCategory" class="form-control" required>
                      <option value="">Select...</option>
                      <option value="Electronics">Electronics</option>
                      <option value="Clothing">Clothing</option>
                      <option value="Books">Books</option>
                      <option value="Home">Home</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" id="editStock" min="0" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" id="editPrice" step="0.01" min="0" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="editStatus" class="form-control">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="editDescription" class="form-control" rows="2"></textarea>
              </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script> const baseUrl = "<?= base_url() ?>"; </script>
<script src="<?= base_url('js/products/products.js') ?>"></script>
<?= $this->endSection() ?>