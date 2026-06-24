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
              <h2 class="font-heading text-color mb-0">124</h2>
              <span class="text-success small"><i class="fa-solid fa-arrow-up me-1"></i> Aktif</span>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small fw-medium">TOTAL KELAS</span>
                <span class="fs-4 text-success"><i class="fa-solid fa-graduation-cap"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0">10</h2>
              <span class="text-muted small">Kelas Pembelajaran</span>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small fw-medium">MATERI VIDEO</span>
                <span class="fs-4 text-warning"><i class="fa-solid fa-video"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0">45</h2>
              <span class="text-muted small">YouTube Embed</span>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="p-4 border border-color rounded-3 bg-white h-100" style="background-color: var(--card-bg);">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small fw-medium">DISKUSI AKTIF</span>
                <span class="fs-4 text-info"><i class="fa-solid fa-comments"></i></span>
              </div>
              <h2 class="font-heading text-color mb-0">182</h2>
              <span class="text-muted small">Komentar Terjawab</span>
            </div>
          </div>
        </div>

        <div class="row g-4">
          <!-- Recent Users Table -->
          <div class="col-lg-6">
            <h3 class="font-heading h5 mb-3">Siswa Baru Terdaftar</h3>
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
                      <th class="font-heading small py-2">Siswa</th>
                      <th class="font-heading small py-2">Email</th>
                      <th class="font-heading small py-2">Status</th>
                    </tr>
                  </thead>
                  <tbody id="recent-users-tbody">
                    <tr>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" class="rounded-circle" style="width:30px; height:30px; object-fit:cover;">
                          <span class="fw-medium text-color small">Budi Pratama</span>
                        </div>
                      </td>
                      <td><span class="text-muted small">user@alfaiz.com</span></td>
                      <td><span class="badge bg-success-subtle text-success border border-success-subtle small">Aktif</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=60" class="rounded-circle" style="width:30px; height:30px; object-fit:cover;">
                          <span class="fw-medium text-color small">Ahmad Dahlan</span>
                        </div>
                      </td>
                      <td><span class="text-muted small">dahlan@gmail.com</span></td>
                      <td><span class="badge bg-success-subtle text-success border border-success-subtle small">Aktif</span></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=60" class="rounded-circle" style="width:30px; height:30px; object-fit:cover;">
                          <span class="fw-medium text-color small">Siti Aminah</span>
                        </div>
                      </td>
                      <td><span class="text-muted small">siti@outlook.com</span></td>
                      <td><span class="badge bg-success-subtle text-success border border-success-subtle small">Aktif</span></td>
                    </tr>
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
                <div class="list-group-item d-flex gap-3 py-3 border-secondary-subtle bg-transparent">
                  <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" class="rounded-circle" style="width:36px; height:36px; object-fit:cover;">
                  <div class="flex-grow-1">
                    <div class="d-flex justify-content-between">
                      <h6 class="mb-0 fw-semibold text-color small">Budi Pratama</h6>
                      <span class="text-muted" style="font-size:0.7rem;"><i class="fa-solid fa-chalkboard-user me-1"></i> Pengantar Logika...</span>
                    </div>
                    <p class="text-muted small mb-0 mt-1" style="font-size:0.8rem;">"Sangat membantu kak pembahasannya! Jadi paham konsep Silogisme."</p>
                  </div>
                </div>

                <div class="list-group-item d-flex gap-3 py-3 border-secondary-subtle bg-transparent">
                  <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" class="rounded-circle" style="width:36px; height:36px; object-fit:cover;">
                  <div class="flex-grow-1">
                    <div class="d-flex justify-content-between">
                      <h6 class="mb-0 fw-semibold text-color small">Budi Pratama</h6>
                      <span class="text-muted" style="font-size:0.7rem;"><i class="fa-solid fa-chalkboard-user me-1"></i> Pengantar Logika...</span>
                    </div>
                    <p class="text-muted small mb-0 mt-1" style="font-size:0.8rem;">"Kak, apakah ada PDF latihan soal tambahannya?"</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>