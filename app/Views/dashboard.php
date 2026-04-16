<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="fas fa-tachometer-alt mr-2"></i>
            Xin-Pat Inventory Dashboard
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
      <!-- INFO BOXES -->
      <div class="row">
        <!-- Total Products -->
        <div class="col-lg-3 col-6">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
              <i class="fas fa-boxes"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Total Products</span>
              <span class="info-box-number">
                <?= $totalProducts ?? 1247 ?>
                <small class="text-success ml-1">
                  <i class="fas fa-arrow-up"></i> 12%
                </small>
              </span>
            </div>
          </div>
        </div>

        <!-- Total Sales -->
        <div class="col-lg-3 col-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1">
              <i class="fas fa-dollar-sign"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Total Sales</span>
              <span class="info-box-number">$<?= number_format($totalSales ?? 28450) ?></span>
            </div>
          </div>
        </div>

        <!-- Total Stock -->
        <div class="col-lg-3 col-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1">
              <i class="fas fa-warehouse"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Total Stock</span>
              <span class="info-box-number"><?= $totalStock ?? 15892 ?> units</span>
            </div>
          </div>
        </div>

        <!-- Low Stock Alert -->
        <div class="col-lg-3 col-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
              <i class="fas fa-exclamation-triangle"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Low Stock Alert</span>
              <span class="info-box-number"><?= $lowStockCount ?? 7 ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- SECOND ROW - Progress & Charts -->
      <div class="row">
        <!-- Inventory Overview -->
        <div class="col-lg-4 col-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Inventory Status</h3>
            </div>
            <div class="card-body">
              <div class="progress-group">
                <span class="progress-text">Sold Items</span>
                <span class="progress-number"><b><?= $soldPercent ?? 45 ?>%</b>/100%</span>
                <div class="progress sm">
                  <div class="progress-bar bg-success" style="width: <?= $soldPercent ?? 45 ?>%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text">Stock Remaining</span>
                <span class="progress-number"><b><?= $stockPercent ?? 78 ?>%</b></span>
                <div class="progress sm">
                  <div class="progress-bar bg-warning" style="width: <?= $stockPercent ?? 78 ?>%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TOP SELLING PRODUCTS - COCA COLA & RICE -->
        <div class="col-lg-4 col-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Top Selling Products</h3>
            </div>
            <div class="card-body">
              <div class="d-flex mb-3 p-2 bg-light rounded">
                <div>
                  <i class="fas fa-coke fas-2x text-primary mr-3"></i>
                </div>
                <div class="flex-grow-1">
                  <p class="mb-1"><strong>Coca Cola 1.5L</strong></p>
                  <small class="text-muted">2,847 sold</small>
                </div>
                <span class="badge badge-success badge-lg">92%</span>
              </div>
              
              <div class="d-flex p-2 bg-light rounded">
                <div>
                  <i class="fas fa-rice fas-2x text-success mr-3"></i>
                </div>
                <div class="flex-grow-1">
                  <p class="mb-1"><strong>Premium Rice 5kg</strong></p>
                  <small class="text-muted">1,956 sold</small>
                </div>
                <span class="badge badge-primary badge-lg">78%</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Actions</h3>
            </div>
            <div class="card-body">
              <a href="<?= base_url('products') ?>" class="btn btn-info btn-block mb-2">
                <i class="fas fa-plus mr-2"></i>Add Product
              </a>
              <a href="<?= base_url('stockin') ?>" class="btn btn-success btn-block mb-2">
                <i class="fas fa-truck mr-2"></i>Stock In
              </a>
              <a href="<?= base_url('sales') ?>" class="btn btn-warning btn-block">
                <i class="fas fa-cash-register mr-2"></i>New Sale
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- THIRD ROW - Charts & Recent Activity -->
      <div class="row">
        <!-- Sales Chart -->
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Sales Trend (Coca Cola & Rice)</h3>
                <a href="<?= base_url('reports') ?>">View Report</a>
              </div>
            </div>
            <div class="card-body">
              <canvas id="salesChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>

        <!-- Recent Transactions -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Recent Transactions</h3>
            </div>
            <div class="card-body">
              <div class="transaction-item mb-2 p-2 bg-light rounded">
                <div class="d-flex justify-content-between">
                  <span><i class="fas fa-coke text-primary mr-2"></i>Coca Cola x24</span>
                  <strong>+$72</strong>
                </div>
                <small class="text-muted">2 mins ago</small>
              </div>
              <div class="transaction-item mb-2 p-2 bg-light rounded">
                <div class="d-flex justify-content-between">
                  <span><i class="fas fa-rice text-success mr-2"></i>Rice 5kg x3</span>
                  <strong>+$45</strong>
                </div>
                <small class="text-muted">15 mins ago</small>
              </div>
              <div class="transaction-item p-2 bg-light rounded">
                <div class="d-flex justify-content-between">
                  <span><i class="fas fa-truck text-info mr-2"></i>Stock In Rice</span>
                  <strong>+100kg</strong>
                </div>
                <small class="text-muted">1 hour ago</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Low Stock Alert Table -->
      <div class="row">
        <div class="col-12">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Low Stock Alert (<?= $lowStockCount ?? 7 ?> items)</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-valign-middle">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Stock</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><i class="fas fa-coke text-primary mr-2"></i>Coca Cola 1.5L</td>
                    <td><span class="badge badge-danger">8</span></td>
                    <td><a href="<?= base_url('stockin') ?>" class="btn btn-sm btn-warning">Restock</a></td>
                  </tr>
                  <tr>
                    <td><i class="fas fa-rice text-success mr-2"></i>Premium Rice 5kg</td>
                    <td><span class="badge badge-warning">15</span></td>
                    <td><a href="<?= base_url('stockin') ?>" class="btn btn-sm btn-warning">Restock</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Low Stock Alert Toast -->
<div class="position-fixed" style="top: 20px; right: 20px; z-index: 1050;">
  <div id="lowStockToast" class="toast bg-danger text-white" role="alert">
    <div class="toast-header bg-danger text-white">
      <i class="fas fa-exclamation-triangle mr-2"></i>
      <strong class="mr-auto">Low Stock Alert</strong>
      <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast">
        <span>&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Coca Cola & Rice need restocking!
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Sales Chart - Coca Cola & Rice
var ctx = document.getElementById('salesChart').getContext('2d');
var salesChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    datasets: [{
      label: 'Coca Cola',
      data: [1200, 1500, 1800, 2200, 2500, 2847],
      borderColor: '#f40a0e',
      backgroundColor: 'rgba(0, 123, 255, 0.1)',
      tension: 0.4
    }, {
      label: 'Rice',
      data: [800, 950, 1200, 1500, 1750, 1956],
      borderColor: '#5a9db6',
      backgroundColor: 'rgba(40, 167, 69, 0.1)',
      tension: 0.4
    }]
  },
  options: { 
    responsive: true, 
    scales: { 
      y: { beginAtZero: true } 
    } 
  }
});

// Show Low Stock Toast
$(document).ready(function() {
  if(<?= $lowStockCount ?? 0 ?> > 0) {
    $('#lowStockToast').toast('show');
  }
});
</script>
<?= $this->endSection() ?>