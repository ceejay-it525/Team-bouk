<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>XIN-PAT Store | Secure Login</title>

  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', 'Source Sans Pro', sans-serif;
      background: radial-gradient(circle at top, #1a1a1a, #0d0d0d 60%, #000);
      color: #fff;
    }

    .login-page {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }

    .login-box {
      width: 100%;
      max-width: 430px;
    }

    .card {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      backdrop-filter: blur(12px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7);
      overflow: hidden;
    }

    .login-header {
      text-align: center;
      padding: 35px 20px 15px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    /* 🏪 REAL SARI-SARI SIGNBOARD */
    .logo-sign {
      width: 200px;
      margin: 0 auto 15px;
      padding: 12px;
      border: 2px solid rgba(255,255,255,0.25);
      border-radius: 12px;
      font-family: monospace;
      font-weight: 800;
      letter-spacing: 2px;
      background: rgba(0,0,0,0.6);
      box-shadow: 0 15px 40px rgba(0,0,0,0.9);
      position: relative;
      overflow: hidden;
      text-align: center;
    }

    .logo-sign pre {
      margin: 0;
      color: #fff;
      font-size: 15px;
      line-height: 1.3;
    }

    /* glow */
    .logo-sign::before {
      content: "";
      position: absolute;
      inset: -40px;
      background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
      animation: glow 3s infinite;
    }

    @keyframes glow {
      0%,100% { opacity: 0.3; }
      50% { opacity: 0.7; }
    }

    .login-header h1 {
      margin: 0;
      font-size: 24px;
      font-weight: 800;
      letter-spacing: 2px;
    }

    .login-header p {
      margin-top: 5px;
      font-size: 13px;
      color: #aaa;
    }

    .card-body {
      padding: 30px;
    }

    .form-control {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 10px;
      color: #fff;
      padding: 12px 14px;
    }

    .form-control::placeholder {
      color: #888;
    }

    .form-control:focus {
      border-color: #fff;
      background: rgba(255,255,255,0.08);
      box-shadow: 0 0 0 2px rgba(255,255,255,0.15);
    }

    .input-group-text {
      background: #111;
      border: 1px solid rgba(255,255,255,0.12);
      color: #fff;
      cursor: pointer;
    }

    .btn-login {
      background: #fff;
      color: #000;
      border: none;
      border-radius: 10px;
      font-weight: 800;
      transition: 0.2s;
    }

    .btn-login:hover {
      background: #ddd;
      transform: translateY(-2px);
    }

    .footer-note {
      text-align: center;
      font-size: 12px;
      color: #777;
      margin-top: 15px;
    }
  </style>
</head>

<body class="login-page">

<div class="login-box">
  <div class="card">

    <!-- HEADER -->
    <div class="login-header">

      <!-- 🏪 SARI-SARI STORE SIGN -->
      <div class="logo-sign">
<pre>XIN
PAT
STORE</pre>
      </div>

      <h1>XIN-PAT STORE</h1>
      <p>Your Neighborhood Sari-Sari Store</p>
    </div>

    <div class="card-body">

      <?php $lockoutTime = $lockout ?? 0; ?>

      <?php if ($lockoutTime > 0): ?>
        <div class="alert alert-warning text-center">
          <i class="fas fa-clock"></i>
          Too many attempts. Wait <span id="lockout-timer"></span>.
        </div>

      <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('/auth') ?>" method="post">
        <?= csrf_field() ?>

        <!-- EMAIL -->
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-envelope"></i>
            </div>
          </div>
        </div>

        <!-- PASSWORD WITH TOGGLE -->
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

          <div class="input-group-append">
            <div class="input-group-text" onclick="togglePassword()">
              <i class="fas fa-eye" id="eyeIcon"></i>
            </div>
          </div>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn btn-login btn-block">
          SIGN IN
        </button>

      </form>

      <div class="footer-note">
        XIN-PAT STORE • Secure Login System
      </div>

    </div>
  </div>
</div>

<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>

<script>
function togglePassword() {
  const pass = document.getElementById("password");
  const icon = document.getElementById("eyeIcon");

  if (pass.type === "password") {
    pass.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    pass.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}
</script>

</body>
</html>