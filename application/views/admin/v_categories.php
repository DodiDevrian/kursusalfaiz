      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
          <div>
            <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KATEGORISASI MATERI</span>
            <h1 class="font-heading h3 text-color mb-0">Kelola Kategori</h1>
          </div>
          <button class="btn btn-danger px-4 border-0 bg-primary-custom text-white" data-bs-toggle="modal" data-bs-target="#categoryModal" id="add-category-btn"><i class="fa-solid fa-plus me-1"></i> Tambah Kategori</button>
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
              <input type="text" class="form-control form-control-custom border-start-0 border-secondary-subtle ps-0 table-search-input" placeholder="Cari kategori...">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col" class="font-heading small py-3" style="width: 10%;">Icon</th>
                  <th scope="col" class="font-heading small py-3" style="width: 30%;">Nama Kategori</th>
                  <th scope="col" class="font-heading small py-3" style="width: 35%;">Slug URL</th>
                  <th scope="col" class="font-heading small py-3 text-end" style="width: 25%;">Aksi</th>
                </tr>
              </thead>
              <tbody id="categories-tbody">
                <?php foreach ($categories as $key => $value) { ?>
                <tr>
                  <td>
                    <div class="fs-4 text-primary-custom text-center" style="width:45px;"><i class="fa-solid <?= $value->icon ?>"></i></div>
                  </td>
                  <td><h6 class="mb-0 fw-semibold text-color small"><?= $value->nama_kategori ?></h6></td>
                  <td><code class="small"><?= $value->slug ?></code></td>
                  <td class="text-end">
                    <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 me-2 edit-cat-btn" data-id="<?= $value->id ?>" data-name="<?= $value->nama_kategori ?>" data-slug="<?= $value->slug ?>" data-icon="<?= $value->icon ?>">Edit</button>
                    <a href="<?= base_url('admin/categories/delete/' . $value->id) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3 delete-cat-btn">Hapus</a>
                  </td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-secondary-subtle">
          <h5 class="modal-title font-heading h6 text-color" id="categoryModalLabel">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="category-form" action="<?= base_url('admin/categories/simpan') ?>" method="post">
          <input type="hidden" id="category-id" name="id">
          <div class="modal-body">
            <div class="mb-3">
              <label for="cat-name" class="form-label small text-muted">Nama Kategori</label>
              <input type="text" class="form-control form-control-custom" id="cat-name" placeholder="Contoh: UTBK SNBT" name="nama_kategori" required>
            </div>
            <div class="mb-3">
              <label for="cat-slug" class="form-label small text-muted">Slug URL</label>
              <input type="text" class="form-control form-control-custom" id="cat-slug" placeholder="Contoh: utbk-snbt" name="slug" required>
            </div>
            <div class="mb-3">
              <label for="cat-icon" class="form-label small text-muted">Class Icon (FontAwesome)</label>
              <input type="text" class="form-control form-control-custom" id="cat-icon" placeholder="Contoh: fa-graduation-cap" name="icon" required>
              <div class="form-text small text-muted mt-2">
                Contoh icon FontAwesome (Klik untuk memilih):<br>
                <div class="d-flex flex-wrap gap-2 mt-2">
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-graduation-cap" style="cursor: pointer;"><i class="fa-solid fa-graduation-cap me-1 text-primary-custom"></i> fa-graduation-cap</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-shield-halved" style="cursor: pointer;"><i class="fa-solid fa-shield-halved me-1 text-primary-custom"></i> fa-shield-halved</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-user-tie" style="cursor: pointer;"><i class="fa-solid fa-user-tie me-1 text-primary-custom"></i> fa-user-tie</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-book" style="cursor: pointer;"><i class="fa-solid fa-book me-1 text-primary-custom"></i> fa-book</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-users" style="cursor: pointer;"><i class="fa-solid fa-users me-1 text-primary-custom"></i> fa-users</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-video" style="cursor: pointer;"><i class="fa-solid fa-video me-1 text-primary-custom"></i> fa-video</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-comments" style="cursor: pointer;"><i class="fa-solid fa-comments me-1 text-primary-custom"></i> fa-comments</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-chalkboard-user" style="cursor: pointer;"><i class="fa-solid fa-chalkboard-user me-1 text-primary-custom"></i> fa-chalkboard-user</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-brain" style="cursor: pointer;"><i class="fa-solid fa-brain me-1 text-primary-custom"></i> fa-brain</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-calculator" style="cursor: pointer;"><i class="fa-solid fa-calculator me-1 text-primary-custom"></i> fa-calculator</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-pen-to-square" style="cursor: pointer;"><i class="fa-solid fa-pen-to-square me-1 text-primary-custom"></i> fa-pen-to-square</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-award" style="cursor: pointer;"><i class="fa-solid fa-award me-1 text-primary-custom"></i> fa-award</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-file-lines" style="cursor: pointer;"><i class="fa-solid fa-file-lines me-1 text-primary-custom"></i> fa-file-lines</span>
                  <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 select-icon-badge" data-icon="fa-puzzle-piece" style="cursor: pointer;"><i class="fa-solid fa-puzzle-piece me-1 text-primary-custom"></i> fa-puzzle-piece</span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-secondary-subtle">
            <button type="button" class="btn btn-outline-secondary py-2" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger py-2 px-4 border-0 bg-primary-custom text-white font-heading">SIMPAN</button>
          </div>
        </form>
      </div>
    </div>
  </div>
