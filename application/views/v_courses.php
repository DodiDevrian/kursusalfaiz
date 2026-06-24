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
            <button class="btn btn-outline-primary-custom px-4 py-2 btn-filter" data-category="utbk">UTBK SNBT</button>
            <button class="btn btn-outline-primary-custom px-4 py-2 btn-filter" data-category="skd">SKD Kedinasan</button>
            <button class="btn btn-outline-primary-custom px-4 py-2 btn-filter" data-category="cpns">CPNS 2026</button>
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
        <div class="col-lg-4 col-md-6 course-item-card" data-category="utbk">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">UTBK</span>
              <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&auto=format&fit=crop&q=60" alt="Penalaran Umum">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2 text-color">Penalaran Umum UTBK</h4>
              <p class="text-muted small flex-grow-1">Materi dan strategi menjawab soal Penalaran Umum UTBK SNBT secara cepat dan tepat.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=penalaran-umum" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-4 col-md-6 course-item-card" data-category="utbk">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">UTBK</span>
              <img src="https://images.unsplash.com/photo-1509228468518-180dd4864904?w=600&auto=format&fit=crop&q=60" alt="Pengetahuan Kuantitatif">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2 text-color">Pengetahuan Kuantitatif</h4>
              <p class="text-muted small flex-grow-1">Kumpulan konsep matematika dasar, logika aritmatika, dan pemecahan masalah kuantitatif.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=pengetahuan-kuantitatif" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-4 col-md-6 course-item-card" data-category="utbk">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">UTBK</span>
              <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=600&auto=format&fit=crop&q=60" alt="Penalaran Matematika">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2 text-color">Penalaran Matematika</h4>
              <p class="text-muted small flex-grow-1">Analisis data, peluang, dan pemecahan kasus kontekstual menggunakan matematika.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=penalaran-matematika" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-4 col-md-6 course-item-card" data-category="skd">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">SKD KEDINASAN</span>
              <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=600&auto=format&fit=crop&q=60" alt="TWK SKD">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2 text-color">Tes Wawasan Kebangsaan (TWK) SKD</h4>
              <p class="text-muted small flex-grow-1">Penguasaan materi Pancasila, UUD 1945, Bhinneka Tunggal Ika, dan NKRI.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=twk-skd" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="col-lg-4 col-md-6 course-item-card" data-category="skd">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">SKD KEDINASAN</span>
              <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=600&auto=format&fit=crop&q=60" alt="TIU SKD">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2 text-color">Tes Inteligensia Umum (TIU) SKD</h4>
              <p class="text-muted small flex-grow-1">Kemampuan verbal, numerik, dan figural untuk SKD Sekolah Kedinasan.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=tiu-skd" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="col-lg-4 col-md-6 course-item-card" data-category="cpns">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">CPNS</span>
              <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&auto=format&fit=crop&q=60" alt="TIU CPNS">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2 text-color">Kupas Tuntas TIU CPNS 2026</h4>
              <p class="text-muted small flex-grow-1">Persiapan intensif Tes Inteligensia Umum CPNS dengan metode pengerjaan kilat.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=tiu-cpns" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Empty State -->
      <div id="empty-state" class="text-center py-5 d-none">
        <div class="fs-1 text-muted mb-3"><i class="fa-solid fa-folder-open"></i></div>
        <h4 class="font-heading text-muted">Kelas Tidak Ditemukan</h4>
        <p class="text-muted small">Coba gunakan kata kunci pencarian atau kategori filter lainnya.</p>
      </div>
    </div>
  </section>