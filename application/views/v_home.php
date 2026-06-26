  <!-- 2. Hero Section -->
  <section class="hero-section d-flex align-items-center min-vh-100">
    <div class="container mt-5">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <span class="badge bg-gold-custom text-white px-3 py-2 mb-3 font-heading" style="letter-spacing: 1px;">100% GRATIS SELAMANYA</span>
          <h1 class="font-heading mb-3">Jangkau Impianmu Bersama Al Faiz</h1>
          <p class="lead mb-4 text-white-50" style="font-weight: 300;">Persiapan matang menghadapi UTBK-SNBT, Seleksi Kompetensi Dasar (SKD) Sekolah Kedinasan, dan Seleksi CPNS dengan materi terstruktur gratis terbaik.</p>
          <div class="d-flex flex-column flex-sm-row gap-3">
            <a href="auth/login" class="btn btn-gold-custom px-5 py-3 font-heading text-white border-0 bg-gold-custom" style="font-weight: 600; letter-spacing: 1px;">MULAI BELAJAR</a>
            <a href="courses" class="btn btn-outline-light px-5 py-3" style="font-family: var(--font-heading); font-weight: 600; letter-spacing: 1px; border-width: 2px;">LIHAT KELAS</a>
          </div>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
          <img src="<?= base_url('assets/img/hero.png') ?>" alt="Al Faiz Belajar" class="img-fluid" style="max-height: 450px; width: 100%; object-fit: cover;">
        </div>
      </div>
    </div>
  </section>

  <!-- 3. Kategori Pembelajaran -->
  <section class="py-5" style="margin-top: -60px; position: relative; z-index: 10;">
    <div class="container">
      <div class="row g-4 justify-content-center">
        <div class="col-md-4 col-sm-6">
          <div class="category-box" onclick="window.location.href='courses?category=utbk'">
            <div class="icon-box"><i class="fa-solid fa-graduation-cap"></i></div>
            <h4 class="font-heading h5 mb-2">UTBK-SNBT</h4>
            <p class="text-muted small mb-0">Materi Penalaran Umum, Kuantitatif, Matematika, dan Literasi.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="category-box" onclick="window.location.href='courses?category=skd'">
            <div class="icon-box"><i class="fa-solid fa-shield-halved"></i></div>
            <h4 class="font-heading h5 mb-2">SKD KEDINASAN</h4>
            <p class="text-muted small mb-0">Pelatihan TWK, TIU, TKP khusus seleksi sekolah kedinasan.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="category-box" onclick="window.location.href='courses?category=cpns'">
            <div class="icon-box"><i class="fa-solid fa-user-tie"></i></div>
            <h4 class="font-heading h5 mb-2">CPNS 2026</h4>
            <p class="text-muted small mb-0">Kunci lolos passing grade SKD CPNS dengan FR ter-update.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Course Terbaru -->
  <section class="py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KELAS BARU</span>
          <h2 class="font-heading h3 mb-0">Materi Pembelajaran Terbaru</h2>
        </div>
        <a href="courses" class="text-primary-custom fw-semibold text-decoration-none small">Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i></a>
      </div>
      <div class="row g-4" id="latest-courses-list">
        <?php foreach ($get3 as $course) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category"><?= $course->nama_kategori ?></span>
              <img src="<?= $course->thumbnail ?>" alt="Penalaran Umum">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2"><?= $course->judul ?></h4>
              <p class="text-muted small flex-grow-1"><?= $course->deskripsi ?></p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <?php if ($this->session->userdata('nama')) { ?>
                  <a href="<?= base_url('course_detail'); ?>?slug=<?= $course->slug; ?>" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
                <?php } else { ?>
                  <a href="#" class="btn btn-primary-custom btn-sm px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Lihat Detail</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- 5. Course Populer -->
  <section class="py-5 bg-light-subtle" style="background-color: var(--light);">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">POPULER</span>
          <h2 class="font-heading h3 mb-0">Kelas Paling Banyak Dipelajari</h2>
        </div>
        <a href="courses" class="text-primary-custom fw-semibold text-decoration-none small">Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i></a>
      </div>
      <div class="row g-4" id="popular-courses-list">
        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">CPNS</span>
              <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&auto=format&fit=crop&q=60" alt="TIU CPNS">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2">Kupas Tuntas TIU CPNS 2026</h4>
              <p class="text-muted small flex-grow-1">Persiapan intensif Tes Inteligensia Umum CPNS dengan metode pengerjaan kilat.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=tiu-cpns" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">UTBK</span>
              <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=600&auto=format&fit=crop&q=60" alt="Penalaran Matematika">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2">Penalaran Matematika</h4>
              <p class="text-muted small flex-grow-1">Analisis data, peluang, dan pemecahan kasus kontekstual menggunakan matematika.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=penalaran-matematika" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="course-card">
            <div class="card-img-wrapper">
              <span class="badge-category">SKD KEDINASAN</span>
              <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=600&auto=format&fit=crop&q=60" alt="TIU SKD">
            </div>
            <div class="card-body">
              <h4 class="font-heading h5 mb-2">Tes Inteligensia Umum (TIU) SKD</h4>
              <p class="text-muted small flex-grow-1">Kemampuan verbal, numerik, dan figural untuk SKD Sekolah Kedinasan.</p>
              <div class="mt-4 pt-3 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                <span class="text-gold fw-bold">Gratis</span>
                <a href="course-detail.html?slug=tiu-skd" class="btn btn-primary-custom btn-sm px-3">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. Kenapa Memilih AL Faiz -->
  <section class="py-5" id="about">
    <div class="container">
      <div class="text-center mb-5 max-width-600 mx-auto">
        <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KEUNGGULAN KAMI</span>
        <h2 class="font-heading h3 mb-3">Kenapa Belajar Bersama AL Faiz?</h2>
        <p class="text-muted">Kami merancang platform ini dengan satu tujuan mulia: meratakan pendidikan di Indonesia melalui kemudahan akses belajar.</p>
      </div>
      <div class="row g-4 text-center">
        <div class="col-md-3 col-sm-6">
          <div class="p-4 border border-color rounded-4 bg-white h-100" style="background-color: var(--card-bg);">
            <div class="fs-1 text-primary-custom mb-3"><i class="fa-solid fa-circle-dollar-to-slot"></i></div>
            <h5 class="font-heading h6 mb-2">100% Gratis</h5>
            <p class="text-muted small mb-0">Semua materi video, pembahasan soal, dan ringkasan PDF dapat diakses gratis tanpa biaya tersembunyi.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="p-4 border border-color rounded-4 bg-white h-100" style="background-color: var(--card-bg);">
            <div class="fs-1 text-primary-custom mb-3"><i class="fa-solid fa-layer-group"></i></div>
            <h5 class="font-heading h6 mb-2">Materi Terstruktur</h5>
            <p class="text-muted small mb-0">Disusun urut berdasarkan sub-materi kisi-kisi resmi BPPP kemendikbud dan BKN.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="p-4 border border-color rounded-4 bg-white h-100" style="background-color: var(--card-bg);">
            <div class="fs-1 text-primary-custom mb-3"><i class="fa-solid fa-clock"></i></div>
            <h5 class="font-heading h6 mb-2">Belajar Fleksibel</h5>
            <p class="text-muted small mb-0">Belajar kapan saja dan di mana saja. Tonton video dan kerjakan soal latihan sesuai kecepatan belajar Anda.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="p-4 border border-color rounded-4 bg-white h-100" style="background-color: var(--card-bg);">
            <div class="fs-1 text-primary-custom mb-3"><i class="fa-solid fa-chalkboard-user"></i></div>
            <h5 class="font-heading h6 mb-2">Trik Jawab Kilat</h5>
            <p class="text-muted small mb-0">Dilengkapi dengan rumus cepat dan tips menjawab soal HOTS yang menghemat waktu ujian.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 7. Statistik Website -->
  <section class="py-5 text-white" style="background: linear-gradient(135deg, var(--primary) 0%, var(--dark-red) 100%);">
    <div class="container">
      <div class="row g-4 text-center">
        <div class="col-md-3 col-6">
          <h3 class="font-heading text-gold display-5 mb-1" style="font-weight: 800;">15K+</h3>
          <p class="text-white-50 small mb-0">Siswa Terdaftar</p>
        </div>
        <div class="col-md-3 col-6">
          <h3 class="font-heading text-gold display-5 mb-1" style="font-weight: 800;">10+</h3>
          <p class="text-white-50 small mb-0">Kelas Pembelajaran</p>
        </div>
        <div class="col-md-3 col-6">
          <h3 class="font-heading text-gold display-5 mb-1" style="font-weight: 800;">120+</h3>
          <p class="text-white-50 small mb-0">Video Pembelajaran</p>
        </div>
        <div class="col-md-3 col-6">
          <h3 class="font-heading text-gold display-5 mb-1" style="font-weight: 800;">5,000+</h3>
          <p class="text-white-50 small mb-0">Materi Selesai</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 8. FAQ -->
  <section class="py-5" id="faq">
    <div class="container max-width-800" style="max-width: 800px;">
      <div class="text-center mb-5">
        <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">PERTANYAAN UMUM</span>
        <h2 class="font-heading h3 mb-2">Sering Ditanyakan (FAQ)</h2>
      </div>
      <div class="accordion" id="accordionFaq">
        <!-- FAQ 1 -->
        <div class="accordion-item border border-color rounded-3 overflow-hidden mb-3 bg-white" style="background-color: var(--card-bg);">
          <h3 class="accordion-header" id="headingFaq-1">
            <button class="accordion-button font-heading py-3" style="color: var(--text-color); font-weight:600;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq-1" aria-expanded="true" aria-controls="collapseFaq-1">
              Apakah seluruh pembelajaran di Al Faiz benar-benar gratis?
            </button>
          </h3>
          <div id="collapseFaq-1" class="accordion-collapse collapse show" aria-labelledby="headingFaq-1" data-bs-parent="#accordionFaq">
            <div class="accordion-body text-muted small pt-0 pb-3">
              Ya, betul sekali. Visi utama Al Faiz adalah menyediakan akses pembelajaran berkualitas secara gratis untuk seluruh pejuang UTBK, SKD, dan CPNS di Indonesia.
            </div>
          </div>
        </div>
        <!-- FAQ 2 -->
        <div class="accordion-item border border-color rounded-3 overflow-hidden mb-3 bg-white" style="background-color: var(--card-bg);">
          <h3 class="accordion-header" id="headingFaq-2">
            <button class="accordion-button font-heading collapsed py-3" style="color: var(--text-color); font-weight:600;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq-2" aria-expanded="false" aria-controls="collapseFaq-2">
              Bagaimana cara mendownload modul materi PDF?
            </button>
          </h3>
          <div id="collapseFaq-2" class="accordion-collapse collapse" aria-labelledby="headingFaq-2" data-bs-parent="#accordionFaq">
            <div class="accordion-body text-muted small pt-0 pb-3">
              Kamu harus mendaftar dan masuk (login) ke dalam akun terlebih dahulu. Setelah itu, buka pelajaran (lesson) yang kamu tuju, dan link download PDF akan aktif di bawah video pembelajaran.
            </div>
          </div>
        </div>
        <!-- FAQ 3 -->
        <div class="accordion-item border border-color rounded-3 overflow-hidden mb-3 bg-white" style="background-color: var(--card-bg);">
          <h3 class="accordion-header" id="headingFaq-3">
            <button class="accordion-button font-heading collapsed py-3" style="color: var(--text-color); font-weight:600;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq-3" aria-expanded="false" aria-controls="collapseFaq-3">
              Apakah ada Try Out simulasi?
            </button>
          </h3>
          <div id="collapseFaq-3" class="accordion-collapse collapse" aria-labelledby="headingFaq-3" data-bs-parent="#accordionFaq">
            <div class="accordion-body text-muted small pt-0 pb-3">
              Fitur Try Out Online dan Bank Soal saat ini sedang direncanakan untuk dirilis pada versi 1.5 mendatang. Ikuti terus update di media sosial kami!
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 9. CTA Section -->
  <section class="py-5 text-center text-white" style="background: linear-gradient(rgba(122, 12, 12, 0.9), rgba(74, 0, 0, 0.95)), url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1200&auto=format&fit=crop&q=80') no-repeat center center; background-size: cover; background-attachment: fixed;">
    <div class="container py-4">
      <h2 class="font-heading mb-3" style="color: aliceblue;">Siap Menghadapi Seleksi UTBK, SKD, & CPNS?</h2>
      <p class="lead text-white-50 max-width-600 mx-auto mb-4" style="max-width: 600px;">Daftarkan dirimu secara gratis sekarang dan mulai belajar dari mentor terbaik di Indonesia.</p>
      <a href="register" class="btn btn-gold-custom px-5 py-3 font-heading text-white border-0 bg-gold-custom" style="font-weight: 600; letter-spacing: 1px;">DAFTAR SEKARANG - 100% GRATIS</a>
    </div>
  </section>