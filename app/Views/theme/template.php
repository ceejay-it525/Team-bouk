<!DOCTYPE html>
<html lang="en" style="font-size: 14px;">
<head>
  <meta name="csrf-name" content="<?= csrf_token() ?>">
  <meta name="csrf-token" content="<?= csrf_hash() ?>">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>XIN-PAT STORE | Inventory System</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">

  <!-- Plugins -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.min.css') ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/toastr/toastr.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- NAVBAR -->
  <?= $this->include('theme/navbar') ?>

  <!-- SIDEBAR -->
  <?= $this->include('theme/sidebar') ?>

  <!-- MAIN CONTENT -->
  <?= $this->renderSection('content') ?>

  <!-- FOOTER -->
  <footer class="main-footer">
    <strong>
      Copyright &copy; 2026 <a href="#">XIN-PAT STORE</a>
    </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> CI4 v1
    </div>
  </footer>

  <!-- CONTROL SIDEBAR -->
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Settings</h5>
      <hr>
      <div class="form-group">
        <label>Option 1</label>
        <input type="checkbox">
      </div>
      <div class="form-group">
        <label>Option 2</label>
        <input type="checkbox">
      </div>
    </div>
  </aside>

</div>

<!-- ================= SCRIPTS ================= -->

<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>

<!-- Plugins -->
<script src="<?= base_url('assets/adminlte/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.min.js') ?>"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>

<!-- Toastr -->
<script src="<?= base_url('assets/adminlte/plugins/toastr/toastr.min.js') ?>"></script>

<?= $this->renderSection('scripts') ?>

<!-- ================= THEME TOGGLE (FIXED + CLEAN) ================= -->
<script>
const themeKey = 'xinpat_theme';

const body = document.body;

// load theme
if (localStorage.getItem(themeKey) === 'dark') {
  body.classList.add('dark-mode');
}

// toggle function (call from navbar button)
function toggleTheme() {
  body.classList.toggle('dark-mode');
  localStorage.setItem(themeKey, body.classList.contains('dark-mode') ? 'dark' : 'light');
}
</script>

</body>
</html>