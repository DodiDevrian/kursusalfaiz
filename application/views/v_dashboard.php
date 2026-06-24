<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Saya - AL Faiz</title>
  <!-- Google Fonts & Bootstrap 5 & FontAwesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="<?= base_url()?>assets/img/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <link rel="stylesheet" href="<?= base_url('template/assets/css/style.css') ?>">
</head>
<body>

  <!-- Top Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom sticky-top py-3">
    <div class="container-fluid px-lg-5">
      <a class="navbar-brand font-heading text-primary-custom" href="<?= base_url('home') ?>" style="font-weight: 800; font-size: 1.5rem; letter-spacing: 2px;">
        AL <span class="text-gold">FAIZ</span>
      </a>
      <div class="d-flex align-items-center gap-3 ms-auto">
        <a href="#" class="theme-toggle-btn text-dark-emphasis p-2" title="Ganti Mode">
          <i class="theme-toggle-icon fa-solid fa-moon fs-5"></i>
        </a>
        <a href="<?= base_url('home') ?>" class="btn btn-outline-primary-custom btn-sm px-3 rounded-pill">Home</a>
      </div>
    </div>
  </nav>

  <!-- Main Container -->
  <div class="container-fluid px-0">
    <div class="row g-0">
      <!-- Sidebar (Left) -->
      <div class="col-lg-3 col-md-4 sidebar-layout px-0">
        <div class="text-center py-4 border-bottom border-secondary-subtle">
          <img id="sidebar-avatar" src="<?= $this->session->userdata('foto') ? $this->session->userdata('foto') : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60' ?>" alt="Avatar" class="rounded-circle mb-2 border border-3 border-color" style="width: 80px; height: 80px; object-fit: cover;">
          <h5 class="mb-1 font-heading text-color h6" id="sidebar-name"><?= $this->session->userdata('nama') ? $this->session->userdata('nama') : 'Budi Pratama' ?></h5>
          <span class="badge bg-gold-custom text-white small">Siswa Al Faiz</span>
        </div>
        
        <div class="py-3">
          <a href="<?= base_url('dashboard') ?>" class="sidebar-link active"><i class="fa-solid fa-gauge"></i> Dashboard Saya</a>
          <a href="<?= base_url('courses') ?>" class="sidebar-link"><i class="fa-solid fa-book-open"></i> My Learning</a>
          <a href="#" class="sidebar-link"><i class="fa-solid fa-bookmark"></i> Bookmark</a>
          <a href="#" class="sidebar-link"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Belajar</a>
          <a href="#" class="sidebar-link"><i class="fa-solid fa-user-gear"></i> Profil & Pengaturan</a>
          <hr class="border-secondary-subtle my-2">
          <a href="<?= base_url('auth/logout') ?>" class="sidebar-link text-danger"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
        </div>
      </div>

      <!-- Content (Right) -->
      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="mb-4">
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">RINGKASAN BELAJAR</span>
          <h1 class="font-heading h3 text-color">Dashboard Saya</h1>
          <p class="text-muted small">Selamat datang kembali! Pantau progres belajarmu dan lanjutkan materi pelajaran yang tertunda.</p>
        </div>

        <!-- Statistics Row -->
        <div class="row g-4 mb-5">
          <div class="col-md-4">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-medium">RATA-RATA PROGRESS</span>
                <span class="fs-4 text-primary-custom"><i class="fa-solid fa-chart-line"></i></span>
              </div>
              <h2 class="font-heading text-color mb-2" id="stats-progress-percent">45%</h2>
              <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-primary-custom" id="stats-progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-medium">KELAS SELESAI</span>
                <span class="fs-4 text-success"><i class="fa-solid fa-circle-check"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0" id="stats-completed-courses">1</h2>
              <p class="text-muted small mb-0 mt-2">Dari <span id="stats-total-courses">3</span> kelas terdaftar</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-medium">KELAS BERJALAN</span>
                <span class="fs-4 text-warning"><i class="fa-solid fa-clock"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0" id="stats-active-courses">2</h2>
              <p class="text-muted small mb-0 mt-2">Kelas belum diselesaikan</p>
            </div>
          </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="row g-4">
          <!-- Recent Course Card -->
          <div class="col-lg-6">
            <h3 class="font-heading h5 mb-3">Kelas Terakhir Diakses</h3>
            <div id="recent-course-container">
              <div class="card border border-color rounded-3 shadow-sm" style="background-color: var(--card-bg); overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&auto=format&fit=crop&q=60" class="card-img-top" style="height: 140px; object-fit: cover;" alt="Penalaran Umum">
                <div class="card-body">
                  <h5 class="font-heading fs-6 mb-1 text-color">Penalaran Umum UTBK</h5>
                  <span class="text-muted small d-block mb-3"><i class="fa-solid fa-play-circle me-1"></i> Materi terakhir: 1. Pengantar Logika Deduktif & Induktif</span>
                  
                  <div class="mb-3">
                    <div class="d-flex justify-content-between small text-muted mb-1">
                      <span>Progres Belajar</span>
                      <span class="fw-semibold">33%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <a href="lesson.html" class="btn btn-primary-custom w-100 py-2 border-0 bg-primary-custom text-white">Lanjutkan Belajar</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Weekly Learning Time Mock Graph -->
          <div class="col-lg-6">
            <h3 class="font-heading h5 mb-3">Statistik Belajar Mingguan</h3>
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg); max-height: 280px;">
              <div class="d-flex justify-content-between align-items-end h-100 pb-3 mt-3" style="min-height: 150px;">
                <div class="d-flex flex-column align-items-center w-100">
                  <div class="bg-primary-custom rounded-top w-50" style="height: 40px; opacity: 0.6;"></div>
                  <span class="text-muted small mt-2" style="font-size: 0.7rem;">Sen</span>
                </div>
                <div class="d-flex flex-column align-items-center w-100">
                  <div class="bg-primary-custom rounded-top w-50" style="height: 110px; opacity: 0.8;"></div>
                  <span class="text-muted small mt-2" style="font-size: 0.7rem;">Sel</span>
                </div>
                <div class="d-flex flex-column align-items-center w-100">
                  <div class="bg-primary-custom rounded-top w-50" style="height: 60px; opacity: 0.6;"></div>
                  <span class="text-muted small mt-2" style="font-size: 0.7rem;">Rab</span>
                </div>
                <div class="d-flex flex-column align-items-center w-100">
                  <div class="bg-primary-custom rounded-top w-50" style="height: 140px; opacity: 0.9;"></div>
                  <span class="text-muted small mt-2" style="font-size: 0.7rem;">Kam</span>
                </div>
                <div class="d-flex flex-column align-items-center w-100">
                  <div class="bg-primary-custom rounded-top w-50" style="height: 80px; opacity: 0.7;"></div>
                  <span class="text-muted small mt-2" style="font-size: 0.7rem;">Jum</span>
                </div>
                <div class="d-flex flex-column align-items-center w-100">
                  <div class="bg-primary-custom rounded-top w-50" style="height: 20px; opacity: 0.5;"></div>
                  <span class="text-muted small mt-2" style="font-size: 0.7rem;">Sab</span>
                </div>
                <div class="d-flex flex-column align-items-center w-100">
                  <div class="bg-primary-custom rounded-top w-50" style="height: 10px; opacity: 0.4;"></div>
                  <span class="text-muted small mt-2" style="font-size: 0.7rem;">Min</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- JS Dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('template/assets/js/app.js') ?>"></script>
</body>
</html>
