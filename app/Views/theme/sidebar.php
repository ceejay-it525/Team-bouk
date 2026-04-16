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

            <!-- DASHBOARD -->
            <li class="nav-item">
                <a href="<?= base_url('dashboard') ?>" 
                   class="nav-link <?= (uri_string() == 'dashboard') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- INVENTORY -->
            <li class="nav-header">INVENTORY</li>

            <li class="nav-item">
                <a href="<?= base_url('products') ?>" 
                   class="nav-link <?= (uri_string() == 'products') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Products</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('categories') ?>" 
                   class="nav-link <?= (uri_string() == 'categories') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>Categories</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('suppliers') ?>" 
                   class="nav-link <?= (uri_string() == 'suppliers') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>Suppliers</p>
                </a>
            </li>

            <!-- TRANSACTIONS -->
            <li class="nav-header">TRANSACTIONS</li>

            <li class="nav-item">
                <a href="<?= base_url('purchases') ?>" class="nav-link">
                    <i class="nav-icon fas fa-arrow-down text-success"></i>
                    <p>Purchases</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('sales') ?>" class="nav-link">
                    <i class="nav-icon fas fa-arrow-up text-danger"></i>
                    <p>Sales</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('inventory') ?>" class="nav-link">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p>Inventory Logs</p>
                </a>
            </li>

            <!-- SYSTEM -->
            <li class="nav-header">SYSTEM</li>

            <li class="nav-item">
                <a href="<?= base_url('users') ?>" class="nav-link">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>Admin Accounts</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('log') ?>" class="nav-link">
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

<!-- USER PANEL -->
<div class="sidebar-custom-content">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url('assets/images/admin.jpg') ?>" class="img-circle elevation-2">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                <?= session()->get('name') ?? 'Admin' ?>
            </a>
            <span class="badge badge-primary">
                <?= session()->get('role') ?? 'Super Admin' ?>
            </span>
        </div>
    </div>
</div>

</aside>