<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">

  <!-- HEADER -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <i class="fas fa-user-shield"></i> Admin Users
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Admin Users</li>
          </ol>
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
          <h3 class="card-title">User Management</h3>

          <button class="btn btn-primary btn-sm float-right"
                  data-toggle="modal"
                  data-target="#AddNewModal">
            <i class="fas fa-plus"></i> Add Admin
          </button>
        </div>

        <!-- TABLE -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th style="display:none;">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Phone</th>
                <th>Created At</th>
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

<!-- ================= ADD MODAL ================= -->
<div class="modal fade" id="AddNewModal">
  <div class="modal-dialog">

    <form id="addUserForm">
      <?= csrf_field() ?>

      <div class="modal-content">

        <div class="modal-header bg-success">
          <h5 class="modal-title text-white">
            <i class="fas fa-user-plus"></i> Add Admin User
          </h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Password *</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <label>Role</label>
              <select name="role" class="form-control">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                <option value="Guest">Guest</option>
              </select>
            </div>

            <div class="col-sm-6">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>

          <div class="form-group mt-2">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-success">
            Save
          </button>
        </div>

      </div>
    </form>

  </div>
</div>

<!-- ================= EDIT MODAL ================= -->
<div class="modal fade" id="editUserModal">
  <div class="modal-dialog">

    <form id="editUserForm">
      <?= csrf_field() ?>

      <div class="modal-content">

        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white">
            <i class="fas fa-user-edit"></i> Edit Admin User
          </h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

          <input type="hidden" id="userId" name="id">

          <div class="form-group">
            <label>Name</label>
            <input type="text" id="name" name="name" class="form-control">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label>Password (leave blank to keep)</label>
            <input type="password" id="password" name="password" class="form-control">
          </div>

          <div class="row">
            <div class="col-sm-6">
              <label>Role</label>
              <select id="role" name="role" class="form-control">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                <option value="Guest">Guest</option>
              </select>
            </div>

            <div class="col-sm-6">
              <label>Status</label>
              <select id="status" name="status" class="form-control">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>

          <div class="form-group mt-2">
            <label>Phone</label>
            <input type="text" id="phone" name="phone" class="form-control">
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-warning">
            Update
          </button>
        </div>

      </div>
    </form>

  </div>
</div>

<div class="toasts-top-right fixed" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"></div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  const baseUrl = "<?= base_url() ?>";
</script>
<script src="<?= base_url('js/users/users.js') ?>"></script>
<?= $this->endSection() ?>