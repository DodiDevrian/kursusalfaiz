<?php 
  $totalCourseProgress = 0;
  $totalCourses = 0;
  $totalCompletedCourses = 0;
  $totalActiveCourses = 0;
  $averageProgress = 0;

  foreach ($course_progress as $key => $value) {
    if($value->user_id == $this->session->userdata('id_user')){
      $totalCourseProgress += $value->progress;
      $totalCourses++;
      $averageProgress = $totalCourseProgress / $totalCourses;

      if($value->progress == 100){
        $totalCompletedCourses++;
      }else{
        $totalActiveCourses++;
      }
    }
  }
?>
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
              <h2 class="font-heading text-color mb-2" id="stats-progress-percent"><?= $averageProgress ?>%</h2>
              <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-primary-custom" id="stats-progress-bar" role="progressbar" style="width: <?= $averageProgress ?>%" aria-valuenow="<?= $averageProgress ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-medium">KELAS SELESAI</span>
                <span class="fs-4 text-success"><i class="fa-solid fa-circle-check"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0" id="stats-completed-courses"><?= $totalCompletedCourses ?></h2>
              <p class="text-muted small mb-0 mt-2">Dari <span id="stats-total-courses"><?= $totalCourses ?></span> kelas terdaftar</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-medium">KELAS BERJALAN</span>
                <span class="fs-4 text-warning"><i class="fa-solid fa-clock"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0" id="stats-active-courses"><?= $totalActiveCourses ?></h2>
              <p class="text-muted small mb-0 mt-2">Kelas belum diselesaikan</p>
            </div>
          </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="row g-4">
          <!-- Recent Course Card -->
          <div class="col-lg-6">
            <h3 class="font-heading h5 mb-3">Kelas Terakhir Diakses</h3>
            <div id="recent-course-container" class="h-100">
              <?php if (empty($recent_course)) { ?>
                <div class="p-4 border border-color rounded-3 bg-white h-100 d-flex flex-column align-items-center justify-content-center py-5 text-center" style="background-color: var(--card-bg); min-height: 320px;">
                  <div class="mb-3 text-muted" style="opacity: 0.5;">
                    <i class="fa-regular fa-folder-open fa-3x"></i>
                  </div>
                  <h6 class="font-heading fw-semibold text-color small">Belum Ada Riwayat Belajar</h6>
                  <p class="text-muted mb-0" style="font-size: 0.8rem; max-width: 250px;">Pilih kelas dari menu Kelas untuk memulai proses belajar Anda!</p>
                </div>
              <?php } else { ?>
                <div class="card border border-color rounded-3 shadow-sm h-100 d-flex flex-column justify-content-between" style="background-color: var(--card-bg); overflow: hidden; min-height: 320px;">
                  <div>
                    <img src="<?= htmlspecialchars($recent_course->thumbnail) ?>" class="card-img-top" style="height: 140px; object-fit: cover;" alt="<?= htmlspecialchars($recent_course->judul) ?>">
                    <div class="card-body">
                      <h5 class="font-heading fs-6 mb-1 text-color"><?= htmlspecialchars($recent_course->judul) ?></h5>
                      <?php if (!empty($recent_lesson)) { ?>
                        <span class="text-muted small d-block mb-3"><i class="fa-solid fa-play-circle me-1"></i> Materi: <?= htmlspecialchars($recent_lesson->judul) ?></span>
                      <?php } ?>
                      
                      <div class="mb-3">
                        <div class="d-flex justify-content-between small text-muted mb-1">
                          <span>Progres Belajar</span>
                          <span class="fw-semibold"><?= $recent_course_progress ?>%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: <?= $recent_course_progress ?>%" aria-valuenow="<?= $recent_course_progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="px-3 pb-3">
                    <?php if (!empty($recent_lesson)) { ?>
                      <a href="<?= base_url('lesson?slug=' . $recent_lesson->slug) ?>" class="btn btn-primary-custom w-100 py-2 border-0 bg-primary-custom text-white">Lanjutkan Belajar</a>
                    <?php } else { ?>
                      <a href="<?= base_url('courses') ?>" class="btn btn-primary-custom w-100 py-2 border-0 bg-primary-custom text-white">Mulai Belajar</a>
                    <?php } ?>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>

          <!-- Recent Comments Section -->
          <div class="col-lg-6">
            <h3 class="font-heading h5 mb-3">Komentar Terbaru Saya</h3>
            <div class="p-4 border border-color rounded-3 bg-white h-100 d-flex flex-column justify-content-between" style="background-color: var(--card-bg); min-height: 320px;">
              <div class="flex-grow-1">
                <?php if (empty($user_comments)) { ?>
                  <div class="d-flex flex-column align-items-center justify-content-center h-100 py-4 text-center">
                    <div class="mb-3 text-muted" style="opacity: 0.5;">
                      <i class="fa-regular fa-comments fa-3x"></i>
                    </div>
                    <h6 class="font-heading fw-semibold text-color small">Belum Ada Komentar</h6>
                    <p class="text-muted mb-0" style="font-size: 0.8rem; max-width: 250px;">Mulai diskusi dan tanyakan materi pelajaran yang belum dipahami!</p>
                  </div>
                <?php } else { ?>
                  <div class="list-group list-group-flush">
                    <?php foreach ($user_comments as $comment) { ?>
                      <div class="list-group-item py-3 px-0 border-secondary-subtle bg-transparent">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                          <a href="<?= base_url('lesson?slug=' . $comment->lesson_slug) ?>" class="text-decoration-none font-heading fw-semibold text-primary-custom small" style="font-size: 0.85rem;">
                            <i class="fa-solid fa-book-open me-1"></i> <?= $comment->judul ?>
                          </a>
                          <span class="text-muted" style="font-size: 0.7rem;"><i class="fa-regular fa-clock me-1"></i> <?= date('d M Y', strtotime($comment->created_at)) ?></span>
                        </div>
                        <p class="text-muted mb-0 ps-3 border-start border-primary-custom" style="border-width: 2px !important; font-style: italic; font-size: 0.8rem; line-height: 1.4;">
                          "<?= htmlspecialchars($comment->komentar) ?>"
                        </p>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

      </div>

