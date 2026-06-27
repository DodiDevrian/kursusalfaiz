      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
          <div>
            <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">INFORMASI BANTUAN</span>
            <h1 class="font-heading h3 text-color mb-0">Kelola FAQ Tanya Jawab</h1>
          </div>
          <button class="btn btn-danger px-4 border-0 bg-primary-custom text-white" data-bs-toggle="modal" data-bs-target="#faqModal" id="add-faq-btn"><i class="fa-solid fa-plus me-1"></i> Tambah FAQ</button>
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
              <input type="text" class="form-control form-control-custom border-start-0 border-secondary-subtle ps-0 table-search-input" placeholder="Cari FAQ...">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col" class="font-heading small py-3" style="width: 30%;">Pertanyaan</th>
                  <th scope="col" class="font-heading small py-3" style="width: 50%;">Jawaban</th>
                  <th scope="col" class="font-heading small py-3 text-end" style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody id="faqs-tbody">
                <?php foreach ($faq as $key => $value) { ?>
                    <tr>
                      <td><h6 class="mb-0 fw-semibold text-color small" style="font-size:0.75rem;"><?= $value->pertanyaan ?></h6></td>
                      <td><p class="text-muted mb-0 small" style="font-size:0.75rem; max-width: 400px; white-space: normal;"><?= $value->jawaban ?></p></td>
                      <td class="text-end">
                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 edit-faq-btn me-2" data-bs-toggle="modal" data-bs-target="#editFaq<?= $value->id ?>">Edit</button>
                        <a href="<?= base_url('admin/faq/delete/' . $value->id) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3 delete-faq-btn">Hapus</a>
                      </td>
                    </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

  <!-- CRUD Modal -->
  <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header border-secondary-subtle">
          <h5 class="modal-title font-heading h6 text-color" id="faqModalLabel">Tambah FAQ Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="faq-form" action="<?= base_url('admin/faq/add') ?>" method="post">
          <input type="hidden" id="faq-id">
          <div class="modal-body">
            <div class="mb-3">
              <label for="faq-question" class="form-label small text-muted">Pertanyaan (Question)</label>
              <input type="text" class="form-control form-control-custom" id="faq-question" name="pertanyaan" placeholder="Masukkan pertanyaan..." required>
            </div>
            <div class="mb-3">
              <label for="faq-answer" class="form-label small text-muted">Jawaban (Answer)</label>
              <textarea class="form-control form-control-custom" id="faq-answer" name="jawaban" rows="4" placeholder="Masukkan jawaban..." required></textarea>
            </div>
          </div>
          <div class="modal-footer border-secondary-subtle">
            <button type="button" class="btn btn-outline-secondary py-2" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger py-2 px-4 border-0 bg-primary-custom text-white font-heading">SIMPAN FAQ</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Edit FAQ Modal -->
     <?php foreach ($faq as $key => $value) { ?>
  <div class="modal fade" id="editFaq<?= $value->id ?>" tabindex="-1" aria-labelledby="editFaq<?= $value->id ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header border-secondary-subtle">
          <h5 class="modal-title font-heading h6 text-color" id="editFaq<?= $value->id ?>Label">Edit FAQ Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editFaq-form" action="<?= base_url('admin/faq/edit/' . $value->id) ?>" method="post">
          <input type="hidden" id="editFaq-id" value="<?= $value->id ?>">
          <div class="modal-body">
            <div class="mb-3">
              <label for="editFaq-question" class="form-label small text-muted">Pertanyaan (Question)</label>
              <input type="text" class="form-control form-control-custom" id="editFaq-question" name="pertanyaan" placeholder="Masukkan pertanyaan..." value="<?= $value->pertanyaan ?>" required>
            </div>
            <div class="mb-3">
              <label for="editFaq-answer" class="form-label small text-muted">Jawaban (Answer)</label>
              <textarea class="form-control form-control-custom" id="editFaq-answer" name="jawaban" rows="4" placeholder="Masukkan jawaban..." required><?= $value->jawaban ?></textarea>
            </div>
          </div>
          <div class="modal-footer border-secondary-subtle">
            <button type="button" class="btn btn-outline-secondary py-2" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger py-2 px-4 border-0 bg-primary-custom text-white font-heading">SIMPAN FAQ</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>

