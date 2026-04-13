<aside class="main-sidebar sidebar-light-light sidebar-light elevation-5" id="mainSidebar">

<div class="brand-link bg-warning" style="cursor: default;">
    <img src="<?= base_url('assets/adminlte/dist/img/AdminLTELogo.png') ?>" 
         class="brand-image img-circle elevation-3" 
         style="opacity: .8">
    <span class="brand-text font-weight-light" style="color: white">
        INVENTORY SYSTEM
    </span>
</div>

<div class="sidebar">
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

    <!-- Dashboard -->
    <li class="nav-item">
        <a href="<?= base_url('dashboard') ?>" class="nav-link <?= is_active(1, 'dashboard') ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>

    <!-- INVENTORY -->
    <li class="nav-header">INVENTORY</li>

    <li class="nav-item">
        <a href="<?= base_url('products') ?>" class="nav-link <?= is_active(1, 'products') ?>">
            <i class="nav-icon fas fa-box"></i>
            <p>Products</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('categories') ?>" class="nav-link <?= is_active(1, 'categories') ?>">
            <i class="nav-icon fas fa-tags"></i>
            <p>Categories</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('suppliers') ?>" class="nav-link <?= is_active(1, 'suppliers') ?>">
            <i class="nav-icon fas fa-truck"></i>
            <p>Suppliers</p>
        </a>
    </li>

    <!-- TRANSACTIONS -->
    <li class="nav-header">TRANSACTIONS</li>

    <li class="nav-item">
        <a href="<?= base_url('purchases') ?>" class="nav-link <?= is_active(1, 'purchases') ?>">
            <i class="nav-icon fas fa-arrow-down"></i>
            <p>Purchases (Stock In)</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('sales') ?>" class="nav-link <?= is_active(1, 'sales') ?>">
            <i class="nav-icon fas fa-arrow-up"></i>
            <p>Sales (Stock Out)</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('inventory') ?>" class="nav-link <?= is_active(1, 'inventory') ?>">
            <i class="nav-icon fas fa-warehouse"></i>
            <p>Inventory Logs</p>
        </a>
    </li>

    <!-- SYSTEM -->
    <li class="nav-header">SYSTEM</li>

    <li class="nav-item">
        <a href="<?= base_url('users') ?>" class="nav-link <?= is_active(1, 'users') ?>">
            <i class="nav-icon fas fa-user-shield"></i>
            <p>Admin Account</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?= base_url('log') ?>" class="nav-link <?= is_active(1, 'log') ?>">
            <i class="nav-icon fas fa-history"></i>
            <p>Activity Logs</p>
        </a>
    </li>

</ul>
</nav>
</div>
</aside>