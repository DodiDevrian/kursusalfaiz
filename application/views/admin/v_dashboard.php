<?php 
  $jml_user = 0;
  foreach ($alluser as $key => $value) {
    $jml_user++;
  }

  $jml_courses = 0;
  foreach ($courses as $key => $value) {
    $jml_courses++;
  }

  $jml_lessons = 0;
  foreach ($lessons as $key => $value) {
    $jml_lessons++;
  }

  $jml_comments = 0;
  foreach ($allcomments as $key => $value) {
    $jml_comments++;
  }
?>

<div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="mb-4">
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KENDALI UTAMA</span>
          <h1 class="font-heading h3 text-color">Dashboard Admin</h1>
          <p class="text-muted small">Selamat datang di panel kontrol admin. Pantau dan modifikasi konten pembelajaran AL Faiz.</p>
        </div>

        <!-- Metrics Grid -->
        <div class="row g-4 mb-5">
          <div class="col-xl-3 col-sm-6">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small fw-medium">TOTAL SISWA</span>
                <span class="fs-4 text-primary-custom"><i class="fa-solid fa-users"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0"><?= $jml_user ?></h2>
              <span class="text-success small"><i class="fa-solid fa-arrow-up me-1"></i> Aktif</span>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small fw-medium">TOTAL KELAS</span>
                <span class="fs-4 text-success"><i class="fa-solid fa-graduation-cap"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0"><?= $jml_courses ?></h2>
              <span class="text-muted small">Kelas Pembelajaran</span>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small fw-medium">MATERI VIDEO</span>
                <span class="fs-4 text-warning"><i class="fa-solid fa-video"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0"><?= $jml_lessons ?></h2>
              <span class="text-muted small">YouTube Embed</span>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small fw-medium">DISKUSI AKTIF</span>
                <span class="fs-4 text-info"><i class="fa-solid fa-comments"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0"><?= $jml_comments ?></h2>
              <span class="text-muted small">Komentar Terjawab</span>
            </div>
          </div>
        </div>

        <div class="row g-4">
          <!-- Recent Users Table -->
          <div class="col-lg-6">
            <h3 class="font-heading h5 mb-3">User Baru Terdaftar</h3>
            <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
              <div class="mb-3">
                <div class="input-group" style="max-width: 250px;">
                  <span class="input-group-text bg-transparent border-end-0 border-secondary-subtle text-muted">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </span>
                  <input type="text" class="form-control form-control-custom border-start-0 border-secondary-subtle ps-0 table-search-input" placeholder="Cari siswa...">
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                  <thead>
                    <tr>
                      <th class="font-heading small py-2">User</th>
                      <th class="font-heading small py-2">Email</th>
                      <th class="font-heading small py-2">Status</th>
                    </tr>
                  </thead>
                  <tbody id="recent-users-tbody">
                    <?php foreach ($newuser as $user) { ?>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?= $user->foto ? $user->foto : 'https://res.cloudinary.com/dhtspwbzr/image/upload/v1782363994/3da39-no-user-image-icon-27_thxfzr.png' ?>" class="rounded-circle" style="width:30px; height:30px; object-fit:cover;">
                          <span class="fw-medium text-color small"><?= $user->nama ?></span>
                        </div>
                      </td>
                      <td><span class="text-muted small"><?= $user->email ?></span></td>
                      <td><span class="badge bg-success-subtle text-success border border-success-subtle small">Aktif</span></td>
                    </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Recent Comments Feed -->
          <div class="col-lg-6">
            <h3 class="font-heading h5 mb-3">Aktivitas Komentar Baru</h3>
            <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
              <div class="list-group list-group-flush" id="recent-comments-list">
                <?php foreach ($newcomments as $comment) { ?>
                <div class="list-group-item d-flex gap-3 py-3 border-secondary-subtle bg-transparent">
                  <img src="https://res.cloudinary.com/dhtspwbzr/image/upload/v1782363994/3da39-no-user-image-icon-27_thxfzr.png" class="rounded-circle" style="width:36px; height:36px; object-fit:cover;">
                  <div class="flex-grow-1">
                    <div class="d-flex justify-content-between">
                      <h6 class="mb-0 fw-semibold text-color small"><?= $comment->nama ?></h6>
                      <span class="text-muted" style="font-size:0.7rem;"><i class="fa-solid fa-chalkboard-user me-1"></i> <?= substr($comment->judul, 0, 15), "..." ?></span>
                    </div>
                    <p class="text-muted small mb-0 mt-1" style="font-size:0.8rem;"><?= $comment->komentar ?></p>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

      </div>