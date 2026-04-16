<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">

  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">
            <i class="fas fa-truck text-success mr-2"></i>
            Suppliers
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Suppliers</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Supplier List</h3>

          <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addSupplierModal">
            <i class="fas fa-plus"></i> Add Supplier
          </button>
        </div>

        <div class="card-body">
          <table id="suppliersTable" class="table table-hover table-bordered table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Company</th>
                <th>Contact</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addSupplierModal">
  <div class="modal-dialog">
    <form id="addSupplierForm">
      <?= csrf_field() ?>
      <div class="modal-content">

        <div class="modal-header bg-primary">
          <h5 class="modal-title">Add Supplier</h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Contact Person</label>
            <input type="text" name="contact_person" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control">
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
          <button type="submit" class="btn btn-primary">Save</button>
        </div>

      </div>
    </form>
  </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editSupplierModal">
  <div class="modal-dialog">
    <form id="editSupplierForm">
      <?= csrf_field() ?>
      <div class="modal-content">

        <div class="modal-header bg-warning">
          <h5 class="modal-title">Edit Supplier</h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

          <input type="hidden" name="id" id="supplierId">

          <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="name" id="editName" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Contact Person</label>
            <input type="text" name="contact_person" id="editContact" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" id="editPhone" class="form-control">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="editEmail" class="form-control">
          </div>

          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" id="editCity" class="form-control">
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

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  const baseUrl = "<?= base_url() ?>";
</script>
<script src="<?= base_url('js/suppliers/suppliers.js') ?>"></script>
<?= $this->endSection() ?>