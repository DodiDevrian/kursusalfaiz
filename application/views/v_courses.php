  <!-- Title Header -->
  <section class="py-5 text-white text-center mt-5" style="background: linear-gradient(135deg, var(--primary) 0%, var(--dark-red) 100%);">
    <div class="container py-4 mt-3">
      <h1 class="font-heading mb-2" style="color: white;">Kelas Pembelajaran Al Faiz</h1>
      <p class="text-white-50 mb-0">Pelajari materi ujian secara mandiri dengan video pembahasan & modul lengkap gratis.</p>
    </div>
  </section>

  <!-- Filter and Search Section -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4 mb-5">
        <!-- Category Filters -->
        <div class="col-md-8">
          <div class="d-flex flex-wrap gap-2" id="category-filter-buttons">
            <button class="btn btn-outline-primary-custom px-4 py-2 active btn-filter" data-category="all">Semua Kelas</button>
            <?php foreach ($categories as $key => $category) { ?>
              <button class="btn btn-outline-primary-custom px-4 py-2 btn-filter" data-category="<?php echo $category->nama_kategori; ?>"><?php echo $category->nama_kategori; ?></button>
            <?php } ?>
          </div>
        </div>
        <!-- Search -->
        <div class="col-md-4">
          <div class="input-group">
            <input type="text" class="form-control form-control-custom" id="search-input" placeholder="Cari materi kelas...">
            <button class="btn btn-primary-custom border-0 bg-primary-custom text-white" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
        </div>
      </div>

      <!-- Course Cards list -->
      <div class="row g-4" id="courses-grid">
        <!-- Card 1 -->
        <?php foreach ($courses as $key => $course) { ?>
        <div class="col-lg-4 col-md-6 course-item-card" data-category="<?= $course->nama_kategori; ?>">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category"><?= $course->nama_kategori; ?></span>
              <img src="<?= $course->thumbnail; ?>" alt="<?= $course->judul; ?>">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2 text-color"><?= $course->judul; ?></h4>
              <p class="text-muted small flex-grow-1"><?= $course->deskripsi; ?></p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="<?= base_url('course_detail'); ?>?slug=<?= $course->slug; ?>" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

      <!-- Pagination Controls -->
      <div id="pagination-wrapper" class="d-flex justify-content-center mt-5 d-none">
        <nav aria-label="Course page navigation">
          <ul class="pagination pagination-custom gap-2" id="courses-pagination">
          </ul>
        </nav>
      </div>
      
      <!-- Empty State -->
      <div id="empty-state" class="text-center py-5 d-none">
        <div class="fs-1 text-muted mb-3"><i class="fa-solid fa-folder-open"></i></div>
        <h4 class="font-heading text-muted">Kelas Tidak Ditemukan</h4>
        <p class="text-muted small">Coba gunakan kata kunci pencarian atau kategori filter lainnya.</p>
      </div>
    </div>
  </section>

  <style>
    .pagination-custom .page-link {
      color: var(--text-color);
      background-color: var(--card-bg);
      border: 1px solid var(--border-color);
      border-radius: 50px !important;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
      font-weight: 500;
    }
    .pagination-custom .page-link:hover {
      background-color: var(--primary);
      color: white;
      border-color: var(--primary);
      transform: translateY(-2px);
    }
    .pagination-custom .page-item.active .page-link {
      background-color: var(--primary) !important;
      color: white !important;
      border-color: var(--primary) !important;
    }
    .pagination-custom .page-item.disabled .page-link {
      opacity: 0.5;
      pointer-events: none;
    }
  </style>