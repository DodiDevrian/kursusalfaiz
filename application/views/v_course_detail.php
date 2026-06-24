  <?php $totalMateri = 0; 
    foreach ($courses as $key => $course) {
        if ($course->slug == $slugurl) {
            $id_course = $course->id;
            $kategori = $course->nama_kategori;
            $judul = $course->judul;
            $deskripsi = $course->deskripsi;
            $thumbnail = $course->thumbnail;

        }
    } 
    foreach ($lessons as $key => $value) {
        if($value->course_id == $id_course){
            $totalMateri++;
        }
    }
  ?>
  <section class="py-5 text-white mt-5" style="background: linear-gradient(135deg, var(--primary) 0%, var(--dark-red) 100%);">
    <div class="container py-4 mt-3">
      <div class="row">
        <div class="col-lg-8">
          <span class="badge bg-gold-custom text-white px-3 py-2 mb-2 font-heading" id="course-category-badge"><?= $kategori ?></span>
          <h1 class="font-heading mb-3" id="course-title" style="color: white;"><?= $judul ?></h1>
          <p class="text-white-50 lead mb-0" id="course-desc-brief"><?= $deskripsi ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content Layout -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <!-- Details & Syllabus (Left Column) -->
        <div class="col-lg-8">
          <!-- Course Thumbnail for Mobile -->
          <div class="d-block d-lg-none mb-4">
            <img id="course-thumb-mobile" src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&auto=format&fit=crop&q=60" alt="Thumbnail" class="img-fluid rounded-3 shadow">
          </div>

          <!-- Description Section -->
          <div class="p-4 border border-color rounded-3 bg-white mb-4" style="background-color: var(--card-bg);">
            <h3 class="font-heading h5 mb-3 border-bottom pb-2">Deskripsi Kelas</h3>
            <div id="course-desc-full" class="text-muted small" style="line-height: 1.7;">
              <p class="mb-3"><?= $deskripsi ?></p>
              <!-- <p>Kelas ini dirancang khusus untuk memberikan wawasan mendalam mengenai materi yang diujikan dalam seleksi. Melalui pembahasan soal HOTS (Higher Order Thinking Skills), pengerjaan modul terstruktur, dan trik pengerjaan cepat ala Al Faiz, peluang kelulusan Anda akan meningkat pesat.</p> -->
            </div>
          </div>

          <!-- Syllabus / Curriculum Section -->
          <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
              <h3 class="font-heading h5 mb-0">Kurikulum Belajar</h3>
              <span class="badge bg-primary-custom text-white" id="course-lessons-count"><?= $totalMateri ?> Materi</span>
            </div>

            <!-- Lessons list -->
            <div class="list-group list-group-flush" id="syllabus-list">
              <!-- Lesson 1 -->
               <?php foreach ($lessons as $key => $value) { ?>
                <?php if($value->course_id == $id_course){ ?>
                <div class="list-group-item d-flex justify-content-between align-items-center py-3 border-secondary-subtle" style="background-color: transparent;">
                    <div class="d-flex align-items-center">
                    <i class="fa-solid fa-circle-play text-primary-custom me-3"></i>
                    <div>
                        <h5 class="mb-0 fs-6 fw-medium text-color"><?= $value->urutan ?>. <?= $value->judul ?></h5>
                        <span class="text-muted small" style="font-size:0.75rem;"><i class="fa-solid fa-video me-1"></i> Video Pembelajaran + PDF</span>
                    </div>
                    </div>
                    <div>
                    <a href="<?= base_url('lesson?slug='.$value->slug) ?>" class="btn btn-primary-custom btn-sm px-3 rounded-pill">Buka</a>
                    </div>
                </div>
                <?php if ($value->urutan == 1) {
                    $mulaiBelajar = $value->slug;
                } ?>
                <?php } ?>
              <?php } ?>

            </div>
          </div>
        </div>

        <!-- Sidebar Widget (Right Column) -->
        <div class="col-lg-4">
          <div class="card border border-color rounded-3 shadow sticky-top" style="top: 100px; background-color: var(--card-bg); overflow:hidden; z-index:10;">
            <div class="d-none d-lg-block">
              <img id="course-thumb-desktop" src="<?= $thumbnail?>" alt="Thumbnail" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
            </div>
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fs-4 fw-bold text-gold">Gratis</span>
                <span class="badge bg-gold-custom text-white py-2 px-3">Akses Penuh</span>
              </div>
              
              <hr class="border-secondary-subtle">

              <!-- Course Info Grid -->
              <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between mb-2 small">
                  <span class="text-muted"><i class="fa-solid fa-list-check me-2"></i>Kategori</span>
                  <span class="fw-semibold text-color"><?= $kategori ?></span>
                </li>
                <li class="d-flex justify-content-between mb-2 small">
                  <span class="text-muted"><i class="fa-solid fa-circle-play me-2"></i>Jumlah Materi</span>
                  <span class="fw-semibold text-color"><?= $totalMateri ?> Materi</span>
                </li>
                <li class="d-flex justify-content-between mb-2 small">
                  <span class="text-muted"><i class="fa-solid fa-shield-halved me-2"></i>Tingkatan</span>
                  <span class="fw-semibold text-color">Semua Jenjang</span>
                </li>
              </ul>

              <!-- CTA Actions -->
              <div id="sidebar-actions">
                <a href="<?= base_url('lesson?slug='.$mulaiBelajar) ?>" class="btn btn-primary-custom w-100 py-3 font-heading border-0 bg-primary-custom text-white" style="letter-spacing:1px;">
                  MULAI BELAJAR
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>