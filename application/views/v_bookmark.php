      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="mb-4">
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">KUMPULAN MATERI</span>
          <h1 class="font-heading h3 text-color">Bookmark Saya</h1>
          <p class="text-muted small">Akses cepat ke materi pembelajaran yang telah Anda tandai sebelumnya.</p>
        </div>
        
        <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo $this->session->flashdata('pesan');
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        ?>

        <!-- Filter and Search Row -->
        <div class="row g-3 mb-4">
          <!-- Search -->
          <div class="col-md-6">
            <input type="text" class="form-control form-control-custom" id="search-bookmark" placeholder="Cari materi pelajaran...">
          </div>
          <!-- Filter by Course -->
          <div class="col-md-6">
            <select class="form-select form-control-custom" id="filter-course">
              <option value="all">Semua Kelas / Course</option>
              <?php
              $courses_list = [];
              foreach ($bookmarks as $value) {
                  if (!in_array($value->judul_course, $courses_list)) {
                      $courses_list[] = $value->judul_course;
                  }
              }
              foreach ($courses_list as $course_title) {
                  echo '<option value="' . htmlspecialchars($course_title) . '">' . htmlspecialchars($course_title) . '</option>';
              }
              ?>
            </select>
          </div>
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
                <?php foreach ($bookmarks as $key => $value) { ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="fs-4 text-primary-custom me-3"><i class="fa-regular fa-file-video"></i></div>
                      <div>
                        <h6 class="mb-0 fw-semibold text-color small"><?= $value->judul ?></h6>
                        <span class="text-muted small" style="font-size:0.75rem;"><i class="fa-solid fa-circle-play me-1"></i> Video + Modul PDF</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge bg-light text-muted border border-secondary-subtle px-3 py-2 small"><?= $value->judul_course ?></span>
                  </td>
                  <td class="text-end">
                    <a href="<?php echo base_url('lesson?slug=' . $value->slug) ?>" class="btn btn-primary-custom btn-sm rounded-pill px-3 me-2 border-0 bg-primary-custom text-white">Buka</a>
                    <a href="<?php echo base_url('bookmark/delete/' . $value->id) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Apakah Anda yakin ingin menghapus bookmark ini?')">Hapus</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          
          <!-- Empty State -->
          <div id="bookmarks-empty" class="text-center py-5 d-none">
            <div class="fs-2 text-muted mb-2"><i class="fa-solid fa-bookmark"></i></div>
            <p class="text-muted small mb-0">Anda belum menyimpan materi apa pun.</p>
          </div>

          <!-- Pagination Control -->
          <div id="bookmark-pagination-wrapper" class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
            <span class="text-muted small" id="bookmark-pagination-info"></span>
            <nav aria-label="Page navigation">
              <ul class="pagination pagination-custom gap-1 mb-0" id="bookmark-pagination">
                <!-- Will be dynamically populated -->
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
          width: 38px;
          height: 38px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-weight: 500;
          transition: all 0.2s ease;
          font-size: 0.85rem;
        }
        .pagination-custom .page-link:hover {
          background-color: var(--primary);
          color: white;
          border-color: var(--primary);
        }
        .pagination-custom .page-item.active .page-link {
          background-color: var(--primary);
          color: white;
          border-color: var(--primary);
        }
        .pagination-custom .page-item.disabled .page-link {
          opacity: 0.5;
          pointer-events: none;
          background-color: var(--card-bg);
          border-color: var(--border-color);
        }
      </style>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
          const rowsPerPage = 5;
          let currentPage = 1;
          let bookmarks = [];

          // Parse the table rows
          $('#bookmarks-list-tbody tr').each(function() {
            const row = $(this);
            const title = row.find('h6').text().toLowerCase();
            const course = row.find('td:nth-child(2) span').text().trim();
            bookmarks.push({
              el: row,
              title: title,
              course: course
            });
          });

          const totalItems = bookmarks.length;
          if (totalItems === 0) {
            showEmptyState("Anda belum menyimpan materi apa pun.");
            return;
          }

          function render() {
            const searchQuery = $('#search-bookmark').val().toLowerCase().trim();
            const selectedCourse = $('#filter-course').val();

            // Filter the array
            const filtered = bookmarks.filter(item => {
              const matchesSearch = item.title.includes(searchQuery);
              const matchesCourse = (selectedCourse === 'all' || item.course === selectedCourse);
              return matchesSearch && matchesCourse;
            });

            const totalFiltered = filtered.length;
            
            if (totalFiltered === 0) {
              showEmptyState("Tidak ada materi bookmark yang cocok dengan pencarian.");
              return;
            }

            // Hide empty state and show table
            $('#bookmarks-empty').addClass('d-none');
            $('.table-responsive').removeClass('d-none');
            $('#bookmark-pagination-wrapper').removeClass('d-none');

            // Calculate pages
            const totalPages = Math.ceil(totalFiltered / rowsPerPage);
            if (currentPage > totalPages) {
              currentPage = totalPages || 1;
            }

            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;

            // Toggle row visibilities
            bookmarks.forEach(item => item.el.hide());
            filtered.forEach((item, index) => {
              if (index >= startIndex && index < endIndex) {
                item.el.show();
              }
            });

            // Update info text
            const displayStart = startIndex + 1;
            const displayEnd = Math.min(endIndex, totalFiltered);
            $('#bookmark-pagination-info').text(`Menampilkan ${displayStart}-${displayEnd} dari ${totalFiltered} data`);

            // Render pagination links
            const paginationContainer = $('#bookmark-pagination');
            paginationContainer.empty();

            // Prev button
            const prevDisabled = (currentPage === 1) ? 'disabled' : '';
            paginationContainer.append(`
              <li class="page-item ${prevDisabled}">
                <a class="page-link" href="#" data-page="${currentPage - 1}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
            `);

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
              const activeClass = (i === currentPage) ? 'active' : '';
              paginationContainer.append(`
                <li class="page-item ${activeClass}">
                  <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
              `);
            }

            // Next button
            const nextDisabled = (currentPage === totalPages) ? 'disabled' : '';
            paginationContainer.append(`
              <li class="page-item ${nextDisabled}">
                <a class="page-link" href="#" data-page="${currentPage + 1}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            `);
          }

          function showEmptyState(message) {
            $('#bookmarks-empty').find('p').text(message);
            $('#bookmarks-empty').removeClass('d-none');
            $('.table-responsive').addClass('d-none');
            $('#bookmark-pagination-wrapper').addClass('d-none');
          }

          // Event handlers
          $('#search-bookmark').on('input', function() {
            currentPage = 1;
            render();
          });

          $('#filter-course').on('change', function() {
            currentPage = 1;
            render();
          });

          $(document).on('click', '#bookmark-pagination .page-link', function(e) {
            e.preventDefault();
            const targetPage = $(this).data('page');
            if (targetPage && !$(this).parent().hasClass('disabled') && !$(this).parent().hasClass('active')) {
              currentPage = targetPage;
              render();
            }
          });

          // Initialize
          render();
        });
      </script>
