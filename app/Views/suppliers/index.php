<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
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
            <li class="breadcrumb-item"><a href="<?= base_url('inventory') ?>">Inventory</a></li>
            <li class="breadcrumb-item active">Suppliers</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-users mr-2"></i>
                Supplier Directory
              </h3>
              <div class="float-right">
                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#addSupplierModal">
                  <i class="fas fa-plus-circle"></i> Add Supplier
                </button>
              </div>
            </div>
            <div class="card-body">
              <table id="suppliersTable" class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th style="display:none;">id</th>
                    <th>Company</th>
                    <th>Contact</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Products</th>
                    <th>Status</th>
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

    <!-- Add New Supplier Modal -->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <form id="addSupplierForm">
          <?= csrf_field() ?>
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title">
                <i class="fas fa-plus-circle mr-2"></i>Add New Supplier
              </h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Company Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Person <span class="text-danger">*</span></label>
                    <input type="text" name="contact_person" class="form-control" required />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Phone <span class="text-danger">*</span></label>
                    <input type="tel" name="phone" class="form-control" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>City <span class="text-danger">*</span></label>
                    <select name="city" class="form-control" required>
                      <option value="">Select City</option>
                      <option value="Jakarta">Jakarta</option>
                      <option value="Bandung">Bandung</option>
                      <option value="Surabaya">Surabaya</option>
                      <option value="Medan">Medan</option>
                      <option value="Semarang">Semarang</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
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
                <label>Address</label>
                <textarea name="address" class="form-control" rows="2" placeholder="Full address..."></textarea>
              </div>

              <div class="form-group">
                <label>Products Supplied (Optional)</label>
                <input type="text" name="products_supplied" class="form-control" 
                       placeholder="Coca Cola, Rice, Milk (comma separated)">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fas fa-times-circle"></i> Cancel
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Supplier
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Edit Supplier Modal -->
    <div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h5 class="modal-title" id="editSupplierModalLabel">
              <i class="fas fa-edit mr-2"></i> Edit Supplier
            </h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form id="editSupplierForm">
            <?= csrf_field() ?>
            <div class="modal-body">
              <input type="hidden" id="supplierId" name="id">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" name="name" id="editName" class="form-control" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" name="contact_person" id="editContact" class="form-control" required />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" id="editPhone" class="form-control" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="editEmail" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>City</label>
                    <select name="city" id="editCity" class="form-control" required>
                      <option value="">Select City</option>
                      <option value="Jakarta">Jakarta</option>
                      <option value="Bandung">Bandung</option>
                      <option value="Surabaya">Surabaya</option>
                      <option value="Medan">Medan</option>
                      <option value="Semarang">Semarang</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
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
                <label>Address</label>
                <textarea name="address" id="editAddress" class="form-control" rows="2"></textarea>
              </div>

              <div class="form-group">
                <label>Products Supplied</label>
                <input type="text" name="products_supplied" id="editProducts" class="form-control" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fas fa-times-circle"></i> Cancel
              </button>
              <button type="submit" class="btn btn-warning">
                <i class="fas fa-save"></i> Update Supplier
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="toasts-top-right fixed" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"></div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script> 
  const baseUrl = "<?= base_url() ?>"; 
</script>
<script src="<?= base_url('js/suppliers/suppliers.js') ?>"></script>
<?= $this->endSection() ?>