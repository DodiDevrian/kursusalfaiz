      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="mb-4">
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KUMPULAN MATERI</span>
          <h1 class="font-heading h3 text-color">Bookmark Saya</h1>
          <p class="text-muted small">Akses cepat ke materi pembelajaran yang telah Anda tandai sebelumnya.</p>
        </div>

        <!-- Bookmarks List -->
        <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
          <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col" class="font-heading small py-3" style="width: 50%;">Materi Pelajaran</th>
                  <th scope="col" class="font-heading small py-3" style="width: 30%;">Kelas / Course</th>
                  <th scope="col" class="font-heading small py-3 text-end" style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody id="bookmarks-list-tbody">
                <!-- Bookmark Row 1 -->
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="fs-4 text-primary-custom me-3"><i class="fa-regular fa-file-video"></i></div>
                      <div>
                        <h6 class="mb-0 fw-semibold text-color small">Pengantar Logika Deduktif & Induktif</h6>
                        <span class="text-muted small" style="font-size:0.75rem;"><i class="fa-solid fa-circle-play me-1"></i> Video + Modul PDF</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge bg-light text-muted border border-secondary-subtle px-3 py-2 small">Penalaran Umum UTBK</span>
                  </td>
                  <td class="text-end">
                    <a href="lesson.html" class="btn btn-primary-custom btn-sm rounded-pill px-3 me-2 border-0 bg-primary-custom text-white">Buka</a>
                    <button class="btn btn-outline-danger btn-sm rounded-pill px-3 delete-bookmark">Hapus</button>
                  </td>
                </tr>

                <!-- Bookmark Row 2 -->
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="fs-4 text-primary-custom me-3"><i class="fa-regular fa-file-video"></i></div>
                      <div>
                        <h6 class="mb-0 fw-semibold text-color small">Pancasila Sebagai Ideologi Negara</h6>
                        <span class="text-muted small" style="font-size:0.75rem;"><i class="fa-solid fa-circle-play me-1"></i> Video + Modul PDF</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge bg-light text-muted border border-secondary-subtle px-3 py-2 small">Tes Wawasan Kebangsaan (TWK) SKD</span>
                  </td>
                  <td class="text-end">
                    <a href="lesson.html" class="btn btn-primary-custom btn-sm rounded-pill px-3 me-2 border-0 bg-primary-custom text-white">Buka</a>
                    <button class="btn btn-outline-danger btn-sm rounded-pill px-3 delete-bookmark">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <!-- Empty State -->
          <div id="bookmarks-empty" class="text-center py-5 d-none">
            <div class="fs-2 text-muted mb-2"><i class="fa-solid fa-bookmark"></i></div>
            <p class="text-muted small mb-0">Anda belum menyimpan materi apa pun.</p>
          </div>
        </div>

      </div>

