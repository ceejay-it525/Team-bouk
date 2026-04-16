<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">

  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <h1>Dashboard</h1>
    </div>
  </div>

  <!-- Content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">

        <!-- Products -->
        <div class="col-lg-3 col-6">
          <div class="info-box">
            <span class="info-box-icon bg-info">
              <i class="fas fa-boxes"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Products</span>
              <span class="info-box-number">
                <?= $totalProducts ?? 0 ?>
              </span>
            </div>
          </div>
        </div>

        <!-- Sales -->
        <div class="col-lg-3 col-6">
          <div class="info-box">
            <span class="info-box-icon bg-success">
              <i class="fas fa-coins"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">
                ₱<?= number_format($totalSales ?? 0) ?>
              </span>
            </div>
          </div>
        </div>

        <!-- Stock -->
        <div class="col-lg-3 col-6">
          <div class="info-box">
            <span class="info-box-icon bg-warning">
              <i class="fas fa-warehouse"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Stock</span>
              <span class="info-box-number">
                <?= $totalStock ?? 0 ?>
              </span>
            </div>
          </div>
        </div>

        <!-- Low Stock -->
        <div class="col-lg-3 col-6">
          <div class="info-box">
            <span class="info-box-icon bg-danger">
              <i class="fas fa-exclamation-triangle"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Low Stock</span>
              <span class="info-box-number">
                <?= $lowStockCount ?? 0 ?>
              </span>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

</div>
<?= $this->endSection() ?>