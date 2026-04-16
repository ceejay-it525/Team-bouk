<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm" id="mainNavbar">

    <!-- LEFT SIDE -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                Dashboard
            </a>
        </li>
    </ul>

    <!-- SEARCH BAR (OPTIONAL BUT MODERN LOOK) -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search products..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- RIGHT SIDE -->
    <ul class="navbar-nav ml-auto">

        <!-- NOTIFICATION -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">3 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-exclamation-triangle mr-2 text-warning"></i> Low stock alert
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-shopping-cart mr-2 text-success"></i> New sale recorded
                </a>
            </div>
        </li>

        <!-- USER -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user-circle"></i>
                <span class="ml-1"><?= session()->get('email') ?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?= base_url('admin/settings') ?>" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('/logout') ?>" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>

    </ul>

</nav>