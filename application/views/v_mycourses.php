      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
          <div>
            <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KELAS AKTIF</span>
            <h1 class="font-heading h3 text-color mb-0">Kelas Saya</h1>
          </div>
          <a href="courses" class="btn btn-primary-custom btn-sm border-0 bg-primary-custom text-white px-3"><i class="fa-solid fa-plus me-1"></i> Tambah Kelas</a>
        </div>

        <!-- Filter tabs -->
        <ul class="nav nav-tabs border-secondary-subtle mb-4" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active font-heading text-color fw-medium" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing-pane" type="button" role="tab" aria-controls="ongoing-pane" aria-selected="true">Sedang Berjalan</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link font-heading text-color fw-medium" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed-pane" type="button" role="tab" aria-controls="completed-pane" aria-selected="false">Selesai Belajar</button>
          </li>
        </ul>

        <!-- Tab contents -->
        <div class="tab-content" id="myTabContent">
          <!-- Ongoing Pane -->
          <div class="tab-pane fade show active" id="ongoing-pane" role="tabpanel" aria-labelledby="ongoing-tab" tabindex="0">
            <div class="row g-4" id="ongoing-courses-grid">
              <?php if (empty($ongoing_courses)) { ?>
                <div class="col-12 text-center py-5">
                  <div class="fs-1 text-muted mb-3"><i class="fa-solid fa-folder-open"></i></div>
                  <h4 class="font-heading text-muted">Belum Ada Kelas Sedang Berjalan</h4>
                  <p class="text-muted small">Anda tidak memiliki kelas yang sedang berjalan saat ini.</p>
                </div>
              <?php } else { ?>
                <?php foreach ($ongoing_courses as $course) { ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                      <div class="card-img-wrapper">
                        <span class="badge-category"><?= htmlspecialchars($course->nama_kategori) ?></span>
                        <img src="<?= htmlspecialchars($course->thumbnail) ?>" alt="<?= htmlspecialchars($course->judul) ?>">
                      </div>
                      <div class="card-body">
                        <h4 class="font-heading h5 mb-2 text-color"><?= htmlspecialchars($course->judul) ?></h4>
                        <p class="text-muted small flex-grow-1"><?= htmlspecialchars($course->deskripsi) ?></p>
                        
                        <div class="mt-3">
                          <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Progress Belajar</span>
                            <span class="fw-semibold"><?= $course->progress ?>%</span>
                          </div>
                          <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?= $course->progress ?>%" aria-valuenow="<?= $course->progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>

                        <div class="mt-4 pt-3 border-top border-secondary-subtle text-end">
                          <a href="<?= base_url('course_detail?slug=' . $course->slug) ?>" class="btn btn-primary-custom btn-sm px-4">Lanjutkan</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          
          <!-- Completed Pane -->
          <div class="tab-pane fade" id="completed-pane" role="tabpanel" aria-labelledby="completed-tab" tabindex="0">
            <div class="row g-4" id="completed-courses-grid">
              <?php if (empty($completed_courses)) { ?>
                <div class="col-12 text-center py-5">
                  <div class="fs-1 text-muted mb-3"><i class="fa-solid fa-folder-open"></i></div>
                  <h4 class="font-heading text-muted">Belum Ada Kelas Selesai</h4>
                  <p class="text-muted small">Selesaikan semua materi pada kelas yang Anda ikuti untuk melihatnya di sini.</p>
                </div>
              <?php } else { ?>
                <?php foreach ($completed_courses as $course) { ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                      <div class="card-img-wrapper">
                        <span class="badge-category"><?= htmlspecialchars($course->nama_kategori) ?></span>
                        <img src="<?= htmlspecialchars($course->thumbnail) ?>" alt="<?= htmlspecialchars($course->judul) ?>">
                      </div>
                      <div class="card-body">
                        <h4 class="font-heading h5 mb-2 text-color"><?= htmlspecialchars($course->judul) ?></h4>
                        <p class="text-muted small flex-grow-1"><?= htmlspecialchars($course->deskripsi) ?></p>
                        
                        <div class="mt-3">
                          <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Progress Belajar</span>
                            <span class="fw-semibold"><?= $course->progress ?>%</span>
                          </div>
                          <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?= $course->progress ?>%" aria-valuenow="<?= $course->progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>

                        <div class="mt-4 pt-3 border-top border-secondary-subtle text-end">
                          <a href="<?= base_url('course_detail?slug=' . $course->slug) ?>" class="btn btn-primary-custom btn-sm px-4">Lihat Kelas</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>
