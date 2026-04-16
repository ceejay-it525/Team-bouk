<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <i class="fas fa-tags text-info mr-2"></i>
            Product Categories
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('inventory') ?>">Inventory</a></li>
            <li class="breadcrumb-item active">Categories</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Category Management</h3>
              <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addCategoryModal">
                <i class="fas fa-plus"></i> Add Category
              </button>
            </div>
            <div class="card-body">
              <table id="categoriesTable" class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Icon</th>
                    <th>Products Count</th>
                    <th>Total Stock Value</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal">
      <div class="modal-dialog">
        <form id="addCategoryForm">
          <?= csrf_field() ?>
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title text-white">
                <i class="fas fa-plus"></i> New Category
              </h5>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Category Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" required 
                       placeholder="e.g., Beverages, Grains">
              </div>
              
              <div class="form-group">
                <label>Icon Emoji (Optional)</label>
                <input type="text" name="icon" class="form-control" 
                       placeholder="🥤 🍚 🧀 🍫 🏠">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" 
                          placeholder="Category description..."></textarea>
              </div>

              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editModal">
      <div class="modal-dialog">
        <form id="editCategoryForm">
          <?= csrf_field() ?>
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h5 class="modal-title text-white">
                <i class="fas fa-edit"></i> Edit Category
              </h5>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" id="editId">
              
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" id="editName" class="form-control" required>
              </div>
              
              <div class="form-group">
                <label>Icon Emoji</label>
                <input type="text" name="icon" id="editIcon" class="form-control">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label>Status</label>
                <select name="status" id="editStatus" class="form-control">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-warning">Update Category</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script> 
  const baseUrl = "<?= base_url() ?>"; 
</script>
<script src="<?= base_url('js/categories/categories.js') ?>"></script>
<?= $this->endSection() ?>