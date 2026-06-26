      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="mb-4">
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">MODERASI KOMUNITAS</span>
          <h1 class="font-heading h3 text-color mb-0">Kelola Komentar & Diskusi</h1>
          <p class="text-muted small">Memantau pertanyaan siswa pada materi pelajaran dan menghapus komentar yang tidak sopan.</p>
        </div>
        <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo $this->session->flashdata('pesan');
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        ?>
        <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
          <div class="mb-3">
            <div class="input-group" style="max-width: 300px;">
              <span class="input-group-text bg-transparent border-end-0 border-secondary-subtle text-muted">
                <i class="fa-solid fa-magnifying-glass"></i>
              </span>
              <input type="text" class="form-control form-control-custom border-start-0 border-secondary-subtle ps-0 table-search-input" placeholder="Cari komentar...">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col" class="font-heading small py-3" style="width: 20%;">Pengirim</th>
                  <th scope="col" class="font-heading small py-3" style="width: 25%;">Materi Pelajaran</th>
                  <th scope="col" class="font-heading small py-3" style="width: 40%;">Isi Komentar</th>
                  <th scope="col" class="font-heading small py-3 text-end" style="width: 15%;">Aksi</th>
                </tr>
              </thead>
              <tbody id="comments-tbody">
                 <?php foreach ($comments as $key => $value) { ?>
                  <?php if ($value->parent_id == NULL) { ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" class="rounded-circle" style="width:30px; height:30px; object-fit:cover;" alt="Avatar">
                      <div>
                        <h6 class="mb-0 fw-semibold text-color small" style="font-size:0.75rem;"><?= $value->nama ?></h6>
                        <span class="text-muted" style="font-size:0.65rem;"><?= $value->created_at ?></span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <a href="lesson.html" target="_blank" class="text-gold small fw-medium text-decoration-none"><?= $value->judul ?></a>
                  </td>
                  <td>
                    <p class="text-muted mb-0 small" style="font-size:0.75rem; white-space: normal; max-width: 350px;"><?= $value->komentar ?></p>
                  </td>
                  <td class="text-end">
                    <a href="<?= base_url('admin/comments/view_reply' . '?reply=' . $value->id) ?>" class="btn btn-outline-success btn-sm rounded-pill px-3">Balasan</a>
                    <a href="<?= base_url('admin/comments/delete/' . $value->id) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3 delete-comment-btn">Hapus</a>
                  </td>
                </tr>
                <?php } ?>
                <?php } ?>

              </tbody>
            </table>
          </div>
          
          <!-- Empty State -->
          <div id="comments-empty" class="text-center py-5 d-none">
            <div class="fs-2 text-muted mb-2"><i class="fa-solid fa-comments"></i></div>
            <p class="text-muted small mb-0">Belum ada komentar masuk.</p>
          </div>
        </div>
      </div>

