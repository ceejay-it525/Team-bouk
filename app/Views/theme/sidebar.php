<aside class="main-sidebar sidebar-dark-primary elevation-4" id="mainSidebar">

<!-- Brand Logo -->
<div class="brand-link bg-gradient-warning">
    <img src="<?= base_url('assets/adminlte/dist/img/AdminLTELogo.png') ?>" 
         class="brand-image img-circle elevation-3" 
         style="opacity: .8">
    <span class="brand-text font-weight-light">
        <strong>Xin-Pat</strong><br>
        <small>INVENTORY SYSTEM</small>
    </span>
</div>

<!-- Sidebar -->
<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" 
            data-widget="treeview" role="menu" data-accordion="false">

            <!-- Dashboard -->
            <li class="nav-item">
                <a href="<?= base_url('dashboard') ?>" class="nav-link <?= (uri_string() == 'dashboard') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <span class="right badge badge-info">Live</span>
                    </p>
                </a>
            </li>

            <!-- INVENTORY SECTION -->
            <li class="nav-header text-warning">🛒 INVENTORY</li>

            <li class="nav-item">
                <a href="<?= base_url('products') ?>" class="nav-link <?= (uri_string() == 'products') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Products <span class="right badge badge-success"><?= $totalProducts ?? '1.2K' ?></span></p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('categories') ?>" class="nav-link <?= (uri_string() == 'categories') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>Categories</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('suppliers') ?>" class="nav-link <?= (uri_string() == 'suppliers') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>Suppliers</p>
                </a>
            </li>

            <!-- TRANSACTIONS SECTION -->
            <li class="nav-header text-success">💰 TRANSACTIONS</li>

            <li class="nav-item">
                <a href="<?= base_url('purchases') ?>" class="nav-link <?= (uri_string() == 'purchases') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-arrow-down text-success"></i>
                    <p>Purchases (Stock In)</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('sales') ?>" class="nav-link <?= (uri_string() == 'sales') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-arrow-up text-danger"></i>
                    <p>Sales (Stock Out) <span class="right badge badge-danger">Hot</span></p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('inventory') ?>" class="nav-link <?= (uri_string() == 'inventory') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p>Inventory Logs <span class="right badge badge-warning"><?= $lowStockCount ?? 7 ?></span></p>
                </a>
            </li>

            <!-- REPORTS SECTION -->
            <li class="nav-header text-primary">📊 REPORTS</li>

            <li class="nav-item">
                <a href="<?= base_url('reports') ?>" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>Reports & Analytics</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('expenses') ?>" class="nav-link">
                    <i class="nav-icon fas fa-coins"></i>
                    <p>Expenses</p>
                </a>
            </li>

            <!-- SYSTEM SECTION -->
            <li class="nav-header text-muted">⚙️ SYSTEM</li>

            <li class="nav-item">
                <a href="<?= base_url('users') ?>" class="nav-link <?= (uri_string() == 'users') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>Admin Accounts</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('log') ?>" class="nav-link <?= (uri_string() == 'log') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-history"></i>
                    <p>Activity Logs</p>
                </a>
            </li>

            <!-- QUICK ACTION -->
            <li class="nav-item mt-4">
                <a href="<?= base_url('sales') ?>" class="nav-link bg-success text-white">
                    <i class="fas fa-cash-register nav-icon"></i>
                    <p><strong>New Sale</strong></p>
                </a>
            </li>

        </ul>
    </nav>
</div>

<!-- Sidebar Mini Profile -->
<div class="sidebar-custom-content">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url('assets/images/admin.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?= session()->get('name') ?? 'Admin' ?></a>
            <span class="badge badge-primary"><?= session()->get('role') ?? 'Super Admin' ?></span>
        </div>
    </div>
</div>
</aside>