<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk - AL Faiz</title>
  <link href="<?= base_url()?>assets/img/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <!-- Google Fonts & Bootstrap 5 & FontAwesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('template/assets/css/style.css') ?>">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 py-5 bg-light-custom" style="background: linear-gradient(135deg, var(--dark-red) 0%, #1a0000 100%);">

  <div class="auth-card shadow-lg bg-white">
    <div class="text-center mb-4">
      <h2 class="font-heading text-primary-custom mb-1" style="font-weight: 800; letter-spacing: 2px;">AL FAIZ</h2>
      <p class="text-muted small">Platform Pembelajaran Online Gratis UTBK, SKD, & CPNS</p>
    </div>

    <form id="login-form" action="<?= base_url() ?>auth/login" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label font-heading text-muted small" style="font-weight: 600;">ALAMAT EMAIL</label>
        <div class="input-group">
          <span class="input-group-text bg-transparent border-end-0 border-color"><i class="fa-solid fa-envelope text-muted"></i></span>
          <input type="email" class="form-control form-control-custom border-start-0 ps-0" id="email" name="email" placeholder="nama@email.com" required>
        </div>
      </div>

      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <label for="password" class="form-label font-heading text-muted small mb-0" style="font-weight: 600;">KATA SANDI</label>
        </div>
        <div class="input-group">
          <span class="input-group-text bg-transparent border-end-0 border-color"><i class="fa-solid fa-lock text-muted"></i></span>
          <input type="password" class="form-control form-control-custom border-start-0 ps-0" id="password" name="password" placeholder="••••••••" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary-custom w-100 py-2.5 font-heading text-white border-0 bg-primary-custom" style="letter-spacing: 1px;">MASUK</button>
    </form>

    <div class="text-center mt-4">
      <p class="text-muted small mb-0">Belum punya akun? <a href="<?= base_url() ?>register" class="text-gold font-heading text-decoration-none" style="font-weight: 600;">Daftar Sekarang</a></p>
      <div class="mt-3">
        <a href="<?= base_url() ?>" class="text-muted small text-decoration-none"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Home</a>
      </div>
    </div>
  </div>

  <!-- JS Dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>template/assets/js/app.js"></script>
</body>
</html>
