      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="mb-4">
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">DIREKTORI PLATFORM</span>
          <h1 class="font-heading h3 text-color mb-0">Kelola Pengguna</h1>
          <p class="text-muted small">Melihat daftar siswa terdaftar, mengganti role, atau menonaktifkan akun yang melanggar ketentuan.</p>
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
              <input type="text" class="form-control form-control-custom border-start-0 border-secondary-subtle ps-0 table-search-input" placeholder="Cari pengguna...">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col" class="font-heading small py-3" style="width: 25%;">Nama Pengguna</th>
                  <th scope="col" class="font-heading small py-3" style="width: 25%;">Email</th>
                  <th scope="col" class="font-heading small py-3" style="width: 15%;">Role</th>
                  <th scope="col" class="font-heading small py-3" style="width: 15%;">Status</th>
                  <th scope="col" class="font-heading small py-3 text-end" style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody id="users-tbody">
                <!-- User 1 -->
                <?php foreach ($user as $key => $value) { ?>
                    <?php if ($value->role != 'admin') { ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2"> 
                      <img src="<?= $value->foto ?>" class="rounded-circle" style="width:36px; height:36px; object-fit:cover;" alt="User Avatar">
                      <div>
                        <h6 class="mb-0 fw-semibold text-color small"><?= $value->nama ?></h6>
                        <span class="text-muted" style="font-size:0.7rem;">Terdaftar: <?= $value->created_at ?></span>
                      </div>
                    </div>
                  </td>
                  <td><span class="text-muted small"><?= $value->email ?></span></td>
                  <td>
                    <span class="badge bg-light text-muted border border-secondary-subtle px-3 py-1 text-uppercase small" style="font-size:0.7rem;"><?= $value->role ?></span>
                  </td>

                  <?php if ($value->status == 'aktif') { ?>
                  <td class="status-cell"><span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 small">Aktif</span></td>
                  <?php } else { ?>
                  <td class="status-cell"><span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 small">Nonaktif</span></td>
                  <?php } ?>

                  <td class="text-end">
                    <?php if ($value->status == 'aktif') { ?>
                      <a href="<?= base_url('admin/user/update_status/' . $value->id_user . '/nonaktif') ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3 toggle-status-btn">Nonaktifkan</a>
                    <?php } else { ?>
                      <a href="<?= base_url('admin/user/update_status/' . $value->id_user . '/aktif') ?>" class="btn btn-outline-success btn-sm rounded-pill px-3 toggle-status-btn">Aktifkan</a>
                    <?php } ?>
                    <a href="<?= base_url('admin/user/delete/' . $value->id_user) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3 delete-user-btn">Hapus</a>
                  </td>
                </tr>
                <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
