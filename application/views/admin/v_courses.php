      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
          <div>
            <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KATEGORISASI MATERI</span>
            <h1 class="font-heading h3 text-color mb-0">Kelola Kelas (Course)</h1>
          </div>
          <button class="btn btn-danger px-4 border-0 bg-primary-custom text-white" data-bs-toggle="modal" data-bs-target="#courseModalTambah" id="add-course-btn"><i class="fa-solid fa-plus me-1"></i> Tambah Kelas</button>
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
              <input type="text" class="form-control form-control-custom border-start-0 border-secondary-subtle ps-0 table-search-input" placeholder="Cari kelas...">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col" class="font-heading small py-3" style="width: 15%;">Thumbnail</th>
                  <th scope="col" class="font-heading small py-3" style="width: 35%;">Nama Kelas / Judul</th>
                  <th scope="col" class="font-heading small py-3" style="width: 15%;">Kategori</th>
                  <th scope="col" class="font-heading small py-3" style="width: 15%;">Status</th>
                  <th scope="col" class="font-heading small py-3 text-end" style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody id="courses-tbody">
                <!-- Course 1 -->
                 <?php foreach ($courses as $key => $value) { ?>
                    <tr>
                      <td>
                        <img src="<?= $value->thumbnail?>" class="rounded shadow-sm" style="width:75px; height:45px; object-fit:cover;" alt="Course Thumbnail">
                      </td>
                      <td>
                        <h6 class="mb-0 fw-semibold text-color small"><?= $value->judul ?></h6>
                        <span class="text-muted d-block" style="font-size:0.7rem;">URL: /course-detail?slug=<?= $value->slug ?></span>
                      </td>
                      <td><span class="text-muted small"><?= $value->nama_kategori ?></span></td>
                      <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 small">Aktif</span></td>
                      <td class="text-end">
                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 me-2 edit-course-btn" data-bs-toggle="modal" data-bs-target="#courseModalEdit<?= $value->id ?>">Edit</button>
                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3 delete-course-btn">Hapus</button>
                      </td>
                    </tr>
                 <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

    <div class="modal fade" id="courseModalTambah" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-secondary-subtle">
                    <h5 class="modal-title font-heading h6 text-color" id="courseModalLabel">Tambah Kelas Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="course-form" method="post" action="<?= base_url('admin/courses/simpan') ?>">
                    <input type="hidden" id="course-id" name="id">
                    <div class="modal-body">
                        <div class="row g-3">
                        <div class="col-md-6">
                            <label for="course-judul" class="form-label small text-muted">Nama Kelas / Judul</label>
                            <input type="text" class="form-control form-control-custom" id="course-judul" name="judul" placeholder="Contoh: Penalaran Matematika UTBK" required>
                        </div>
                        <div class="col-md-6">
                            <label for="course-slug" class="form-label small text-muted">Slug URL</label>
                            <input type="text" class="form-control form-control-custom" id="course-slug" name="slug" placeholder="Contoh: penalaran-matematika" required>
                        </div>
                        <div class="col-md-6">
                            <label for="course-category" class="form-label small text-muted">Kategori</label>
                            <select class="form-select form-control-custom" id="course-category" name="category_id" required>
                            <option value="1">UTBK</option>
                            <option value="2">SKD Kedinasan</option>
                            <option value="3">CPNS</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="course-status" class="form-label small text-muted">Status</label>
                            <select class="form-select form-control-custom" id="course-status" name="status" required>
                            <option value="aktif">Aktif (Tampil di Website)</option>
                            <option value="non-aktif">Non-aktif (Draf)</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="course-thumbnail" class="form-label small text-muted">Thumbnail URL Image</label>
                            <input type="text" class="form-control form-control-custom" id="course-thumbnail" name="thumbnail" placeholder="Masukkan URL Gambar..." required>
                        </div>
                        <div class="col-12">
                            <label for="course-deskripsi" class="form-label small text-muted">Deskripsi Singkat</label>
                            <textarea class="form-control form-control-custom" id="course-deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi mengenai apa yang akan dipelajari dalam kelas..." required></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer border-secondary-subtle">
                        <button type="button" class="btn btn-outline-secondary py-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger py-2 px-4 border-0 bg-primary-custom text-white font-heading">SIMPAN KELAS</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php foreach ($courses as $key => $value) { ?>
    <div class="modal fade" id="courseModalEdit<?= $value->id ?>" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-secondary-subtle">
                    <h5 class="modal-title font-heading h6 text-color" id="courseModalLabel">Edit Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="course-form" method="post" action="<?= base_url('admin/courses/simpan') ?>">
                    <input type="hidden" id="course-id-edit" name="id" value="<?= $value->id ?>">
                    <div class="modal-body">
                        <div class="row g-3">
                        <div class="col-md-6">
                            <label for="course-judul-edit<?= $value->id ?>" class="form-label small text-muted">Nama Kelas / Judul</label>
                            <input type="text" class="form-control form-control-custom" id="course-judul-edit<?= $value->id ?>" name="judul" placeholder="Contoh: Penalaran Matematika UTBK" value="<?= $value->judul ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="course-slug-edit<?= $value->id ?>" class="form-label small text-muted">Slug URL</label>
                            <input type="text" class="form-control form-control-custom" id="course-slug-edit<?= $value->id ?>" name="slug" placeholder="Contoh: penalaran-matematika" value="<?= $value->slug ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="course-category" class="form-label small text-muted">Kategori</label>
                            <select class="form-select form-control-custom" id="course-category" name="category_id" required>
                            <option value="1" <?php if ($value->category_id == 1) { echo 'selected'; } ?>>UTBK</option>
                            <option value="2" <?php if ($value->category_id == 2) { echo 'selected'; } ?>>SKD Kedinasan</option>
                            <option value="3" <?php if ($value->category_id == 3) { echo 'selected'; } ?>>CPNS</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="course-status" class="form-label small text-muted">Status</label>
                            <select class="form-select form-control-custom" id="course-status" name="status" required>
                            <option value="aktif" <?php if ($value->status == 'aktif') { echo 'selected'; } ?>>Aktif (Tampil di Website)</option>
                            <option value="non-aktif" <?php if ($value->status == 'non-aktif') { echo 'selected'; } ?>>Non-aktif (Draf)</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="course-thumbnail" class="form-label small text-muted">Thumbnail URL Image</label>
                            <input type="text" class="form-control form-control-custom" id="course-thumbnail" name="thumbnail" placeholder="Masukkan URL Gambar..." value="<?= $value->thumbnail ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="course-deskripsi" class="form-label small text-muted">Deskripsi Singkat</label>
                            <textarea class="form-control form-control-custom" id="course-deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi mengenai apa yang akan dipelajari dalam kelas..." required><?= $value->deskripsi ?></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer border-secondary-subtle">
                        <button type="button" class="btn btn-outline-secondary py-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger py-2 px-4 border-0 bg-primary-custom text-white font-heading">SIMPAN KELAS</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php } ?>

