<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun - AL Faiz</title>
  <!-- Google Fonts & Bootstrap 5 & FontAwesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url()?>template/assets/css/style.css">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 py-5 bg-light-custom" style="background: linear-gradient(135deg, var(--dark-red) 0%, #1a0000 100%);">

  <div class="auth-card shadow-lg bg-white">
    <div class="text-center mb-4">
      <h2 class="font-heading text-primary-custom mb-1" style="font-weight: 800; letter-spacing: 2px;">AL FAIZ</h2>
      <p class="text-muted small">Mulai Belajar Gratis UTBK, SKD, & CPNS</p>
    </div>

    <form id="register-form" action="login.html">
      <div class="mb-3">
        <label for="nama" class="form-label font-heading text-muted small" style="font-weight: 600;">NAMA LENGKAP</label>
        <div class="input-group">
          <span class="input-group-text bg-transparent border-end-0 border-color"><i class="fa-solid fa-user text-muted"></i></span>
          <input type="text" class="form-control form-control-custom border-start-0 ps-0" id="nama" placeholder="Nama Lengkap Anda" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label font-heading text-muted small" style="font-weight: 600;">ALAMAT EMAIL</label>
        <div class="input-group">
          <span class="input-group-text bg-transparent border-end-0 border-color"><i class="fa-solid fa-envelope text-muted"></i></span>
          <input type="email" class="form-control form-control-custom border-start-0 ps-0" id="email" placeholder="nama@email.com" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label font-heading text-muted small" style="font-weight: 600;">KATA SANDI</label>
        <div class="input-group">
          <span class="input-group-text bg-transparent border-end-0 border-color"><i class="fa-solid fa-lock text-muted"></i></span>
          <input type="password" class="form-control form-control-custom border-start-0 ps-0" id="password" placeholder="Min. 6 karakter" required minlength="6">
        </div>
      </div>

      <div class="mb-4">
        <label for="confirm-password" class="form-label font-heading text-muted small" style="font-weight: 600;">KONFIRMASI KATA SANDI</label>
        <div class="input-group">
          <span class="input-group-text bg-transparent border-end-0 border-color"><i class="fa-solid fa-shield text-muted"></i></span>
          <input type="password" class="form-control form-control-custom border-start-0 ps-0" id="confirm-password" placeholder="Ulangi kata sandi" required minlength="6">
        </div>
      </div>

      <button type="submit" class="btn btn-primary-custom w-100 py-2.5 font-heading text-white border-0 bg-primary-custom" style="letter-spacing: 1px;">DAFTAR AKUN</button>
    </form>

    <div class="text-center mt-4">
      <p class="text-muted small mb-0">Sudah punya akun? <a href="login.html" class="text-gold font-heading text-decoration-none" style="font-weight: 600;">Masuk di Sini</a></p>
      <div class="mt-3">
        <a href="index.html" class="text-muted small text-decoration-none"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Home</a>
      </div>
    </div>
  </div>

  <!-- JS Dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>template/assets/js/app.js"></script>
</body>
</html>
