<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">

  <!-- HEADER -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><i class="fas fa-tags"></i> Categories</h1>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTENT -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">

          <div class="card">

            <!-- CARD HEADER -->
            <div class="card-header">
              <h3 class="card-title">Product Categories</h3>

              <button class="btn btn-primary btn-sm float-right"
                      data-toggle="modal"
                      data-target="#addCategoryModal">
                <i class="fas fa-plus"></i> Add Category
              </button>
            </div>

            <!-- TABLE -->
            <div class="card-body">
              <table id="categoryTable" class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Icon</th>
                    <th>Products</th>
                    <th>Stock Value</th>
                    <th>Status</th>
                    <th>Created</th>
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

    <!-- ADD MODAL -->
    <div class="modal fade" id="addCategoryModal">
      <div class="modal-dialog">

        <form id="addCategoryForm">

          <?= csrf_field() ?>

          <div class="modal-content">

            <div class="modal-header bg-success">
              <h5 class="modal-title text-white">
                <i class="fas fa-plus"></i> New Category
              </h5>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">

              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Icon (FontAwesome class)</label>
                <input type="text" name="icon" class="form-control" placeholder="fas fa-box">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="2"></textarea>
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
              <button type="submit" class="btn btn-success">Save</button>
            </div>

          </div>

        </form>

      </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editCategoryModal">
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
                <label>Icon</label>
                <input type="text" name="icon" id="editIcon" class="form-control">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="editDescription" class="form-control" rows="2"></textarea>
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
<script>
const baseUrl = "<?= base_url() ?>";
</script>
<script src="<?= base_url('js/categories/categories.js') ?>"></script>
<?= $this->endSection() ?>