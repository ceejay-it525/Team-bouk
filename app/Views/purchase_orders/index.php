<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">

  <!-- HEADER -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <i class="fas fa-shopping-cart"></i> Purchase Orders
          </h1>
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
          <h3 class="card-title">All Purchase Orders</h3>

          <button class="btn btn-primary btn-sm float-right"
                  data-toggle="modal"
                  data-target="#addModal">
            <i class="fas fa-plus"></i> Add Purchase
          </button>
        </div>

        <!-- TABLE -->
        <div class="card-body">
          <table id="purchaseTable" class="table table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Supplier</th>
                <th>Product</th>
                <th>Invoice</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
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
<div class="modal fade" id="addModal">
  <div class="modal-dialog">

    <form id="addForm">
      <?= csrf_field() ?>

      <div class="modal-content">

        <div class="modal-header bg-success">
          <h5 class="modal-title text-white">
            <i class="fas fa-plus"></i> New Purchase Order
          </h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label>Supplier *</label>
            <input type="text" name="supplier_id" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Product *</label>
            <input type="text" name="product_id" class="form-control" required>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <label>Quantity *</label>
              <input type="number" name="quantity" class="form-control" min="1" required>
            </div>

            <div class="col-sm-6">
              <label>Unit Price *</label>
              <input type="number" name="price" class="form-control" min="0" step="0.01" required>
            </div>
          </div>

          <div class="form-group mt-2">
            <label>Invoice No</label>
            <input type="text" name="invoice_no" class="form-control">
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

<!-- ================= EDIT MODAL ================= -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog">

    <form id="editForm">
      <?= csrf_field() ?>

      <div class="modal-content">

        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white">
            <i class="fas fa-edit"></i> Edit Purchase
          </h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

          <input type="hidden" name="id" id="editId">

          <div class="form-group">
            <label>Supplier</label>
            <input type="text" name="supplier_id" id="editSupplier" class="form-control">
          </div>

          <div class="form-group">
            <label>Product</label>
            <input type="text" name="product_id" id="editProduct" class="form-control">
          </div>

          <div class="row">
            <div class="col-sm-6">
              <label>Quantity</label>
              <input type="number" name="quantity" id="editQty" class="form-control">
            </div>

            <div class="col-sm-6">
              <label>Unit Price</label>
              <input type="number" name="price" id="editPrice" class="form-control">
            </div>
          </div>

          <div class="form-group mt-2">
            <label>Invoice No</label>
            <input type="text" name="invoice_no" id="editInvoice" class="form-control">
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
<script src="<?= base_url('js/purchase_orders/purchase_orders.js') ?>"></script>
<?= $this->endSection() ?>