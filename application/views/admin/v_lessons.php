<div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
          <div>
            <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KONTEN PEMBELAJARAN</span>
            <h1 class="font-heading h3 text-color mb-0">Kelola Materi Pelajaran (Lessons)</h1>
          </div>
          <button class="btn btn-danger px-4 border-0 bg-primary-custom text-white" data-bs-toggle="modal" data-bs-target="#lessonModal" id="add-lesson-btn"><i class="fa-solid fa-plus me-1"></i> Tambah Materi</button>
        </div>

        <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo $this->session->flashdata('pesan');
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        ?>

        <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
          <div class="mb-3 d-flex flex-wrap gap-2 align-items-center">
            <div class="input-group" style="max-width: 300px;">
              <span class="input-group-text bg-transparent border-end-0 border-secondary-subtle text-muted">
                <i class="fa-solid fa-magnifying-glass"></i>
              </span>
              <input type="text" class="form-control form-control-custom border-start-0 border-secondary-subtle ps-0 table-search-input" placeholder="Cari materi...">
            </div>
            <div style="min-width: 220px;">
              <select class="form-select form-control-custom border-secondary-subtle" id="filter-course">
                <option value="all">Semua Kelas (Filter)</option>
                <?php foreach ($courses as $key => $course) { ?>
                  <option value="<?= htmlspecialchars($course->judul) ?>"><?= $course->judul ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col" class="font-heading small py-3" style="width: 25%;">Kelas / Course</th>
                  <th scope="col" class="font-heading small py-3" style="width: 30%;">Judul Materi</th>
                  <th scope="col" class="font-heading small py-3" style="width: 15%;">Video Youtube ID</th>
                  <th scope="col" class="font-heading small py-3" style="width: 10%;">Urutan</th>
                  <th scope="col" class="font-heading small py-3 text-end" style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody id="lessons-tbody">
                 <?php foreach ($lessons as $key => $value) { ?>
                    <tr>
                      <td><span class="badge bg-light text-muted border border-secondary-subtle px-3 py-2 small"><?= $value->judul_course ?></span></td>
                      <td>
                        <h6 class="mb-0 fw-semibold text-color small"><?= $value->judul ?></h6>
                        <span class="text-muted d-block" style="font-size:0.7rem;">Slug: <?= $value->slug ?></span>
                      </td>
                      <td><code class="small text-danger"><?= $value->video_youtube ?></code></td>
                      <td><span class="fw-semibold text-color small"><?= $value->urutan ?></span></td>
                      <td class="text-end">
                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 me-2 edit-lesson-btn" data-bs-toggle="modal" data-bs-target="#lessonModalEdit<?= $value->id ?>">Edit</button>
                        <a href="<?= base_url('admin/lessons/hapus/' . $value->id) ?>"><button class="btn btn-outline-danger btn-sm rounded-pill px-3 delete-course-btn">Hapus</button></a>
                      </td>
                    </tr>
                 <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- Pagination Wrapper -->
          <div id="lessons-pagination-wrapper" class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2 d-none">
            <div class="text-muted small" id="lessons-page-info">
            </div>
            <nav aria-label="Lessons page navigation">
              <ul class="pagination pagination-custom gap-1 mb-0" id="lessons-pagination">
              </ul>
            </nav>
          </div>
        </div>
      </div>

  <style>
    .pagination-custom .page-link {
      color: var(--text-color);
      background-color: var(--card-bg);
      border: 1px solid var(--border-color);
      border-radius: 50px !important;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
      font-weight: 500;
      font-size: 0.85rem;
    }
    .pagination-custom .page-link:hover {
      background-color: var(--primary);
      color: white;
      border-color: var(--primary);
      transform: translateY(-2px);
    }
    .pagination-custom .page-item.active .page-link {
      background-color: var(--primary) !important;
      color: white !important;
      border-color: var(--primary) !important;
    }
    .pagination-custom .page-item.disabled .page-link {
      opacity: 0.5;
      pointer-events: none;
    }
  </style>

<div class="modal fade" id="lessonModal" tabindex="-1" aria-labelledby="lessonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header border-secondary-subtle">
          <h5 class="modal-title font-heading h6 text-color" id="lessonModalLabel">Tambah Materi Pelajaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="lesson-form" method="post" action="<?= base_url('admin/lessons/simpan') ?>">
          <input type="hidden" id="lesson-id" name="id">
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="lesson-course" class="form-label small text-muted">Pilih Kelas (Course)</label>
                <select class="form-select form-control-custom" id="lesson-course" name="course_id" required>
                  <?php foreach ($courses as $key => $course) { ?>
                    <option value="<?= $course->id ?>"><?= $course->judul ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="lesson-judul" class="form-label small text-muted">Judul Materi</label>
                <input type="text" class="form-control form-control-custom" id="lesson-judul" name="judul" placeholder="Contoh: Pembahasan Soal Silogisme" required>
              </div>
              <div class="col-md-6">
                <label for="lesson-slug" class="form-label small text-muted">Slug URL</label>
                <input type="text" class="form-control form-control-custom" id="lesson-slug" name="slug" placeholder="Contoh: pembahasan-silogisme" required>
              </div>
              <div class="col-md-6">
                <label for="lesson-youtube" class="form-label small text-muted">YouTube Video ID</label>
                <input type="text" class="form-control form-control-custom" id="lesson-youtube" name="video_youtube" placeholder="Contoh: kP3rE059lOk" required>
              </div>
              <div class="col-md-6">
                <label for="lesson-pdf" class="form-label small text-muted">URL Path Modul PDF</label>
                <input type="text" class="form-control form-control-custom" id="lesson-pdf" name="pdf" placeholder="Contoh: uploads/pdf/modul1.pdf" required>
              </div>
              <div class="col-md-6">
                <label for="lesson-urutan" class="form-label small text-muted">No. Urut Pengajaran</label>
                <input type="number" class="form-control form-control-custom" id="lesson-urutan" name="urutan" placeholder="Contoh: 1" required min="1">
              </div>
              <div class="col-12">
                <label for="lesson-deskripsi" class="form-label small text-muted">Deskripsi Materi</label>
                <textarea class="form-control form-control-custom" id="lesson-deskripsi" name="deskripsi" rows="3" placeholder="Tulis rincian materi atau poin penting pembelajaran..." required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer border-secondary-subtle">
            <button type="button" class="btn btn-outline-secondary py-2" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger py-2 px-4 border-0 bg-primary-custom text-white font-heading">SIMPAN MATERI</button>
          </div>
        </form>
      </div>
    </div>
</div>

<?php foreach ($lessons as $key => $value) { ?>
<div class="modal fade" id="lessonModalEdit<?= $value->id ?>" tabindex="-1" aria-labelledby="lessonModalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header border-secondary-subtle">
          <h5 class="modal-title    font-heading h6 text-color" id="lessonModalEditLabel">Edit Materi Pelajaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="lesson-form" method="post" action="<?= base_url('admin/lessons/simpan') ?>">
          <input type="hidden" id="lesson-id-edit<?= $value->id ?>" name="id" value="<?= $value->id ?>">
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="lesson-course" class="form-label small text-muted">Pilih Kelas (Course)</label>
                <select class="form-select form-control-custom" id="lesson-course" name="course_id" required>
                  <?php foreach ($courses as $key => $course) { ?>
                    <option value="<?= $course->id ?>" <?php if($course->id == $value->course_id){ echo 'selected'; } ?>><?= $course->judul ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="lesson-judul-edit<?= $value->id ?>" class="form-label small text-muted">Judul Materi</label>
                <input type="text" class="form-control form-control-custom" id="lesson-judul-edit<?= $value->id ?>" name="judul" placeholder="Contoh: Pembahasan Soal Silogisme" required value="<?= $value->judul ?>">
              </div>
              <div class="col-md-6">
                <label for="lesson-slug-edit<?= $value->id ?>" class="form-label small text-muted">Slug URL</label>
                <input type="text" class="form-control form-control-custom" id="lesson-slug-edit<?= $value->id ?>" name="slug" placeholder="Contoh: pembahasan-silogisme" required value="<?= $value->slug ?>">
              </div>
              <div class="col-md-6">
                <label for="lesson-youtube" class="form-label small text-muted">YouTube Video ID</label>
                <input type="text" class="form-control form-control-custom" id="lesson-youtube" name="video_youtube" placeholder="Contoh: kP3rE059lOk" required value="<?= $value->video_youtube ?>">
              </div>
              <div class="col-md-6">
                <label for="lesson-pdf" class="form-label small text-muted">URL Path Modul PDF</label>
                <input type="text" class="form-control form-control-custom" id="lesson-pdf" name="pdf" placeholder="Contoh: uploads/pdf/modul1.pdf" required value="<?= $value->pdf ?>">
              </div>
              <div class="col-md-6">
                <label for="lesson-urutan" class="form-label small text-muted">No. Urut Pengajaran</label>
                <input type="number" class="form-control form-control-custom" id="lesson-urutan" name="urutan" placeholder="Contoh: 1" required min="1" value="<?= $value->urutan ?>">
              </div>
              <div class="col-12">
                <label for="lesson-deskripsi" class="form-label small text-muted">Deskripsi Materi</label>
                <textarea class="form-control form-control-custom" id="lesson-deskripsi" name="deskripsi" rows="3" placeholder="Tulis rincian materi atau poin penting pembelajaran..." required><?= $value->deskripsi ?></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer border-secondary-subtle">
            <button type="button" class="btn btn-outline-secondary py-2" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger py-2 px-4 border-0 bg-primary-custom text-white font-heading">SIMPAN MATERI</button>
          </div>
        </form>
      </div>
    </div>
</div>
<?php } ?>