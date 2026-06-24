</div>
  </div>

  <!-- JS Dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('template/assets/js/app.js') ?>"></script>

  <script>
    $(document).ready(function() {
      // Auto slug generator
      $('#course-judul').on('input', function() {
        if (!$('#course-id').val()) {
          const slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
          $('#course-slug').val(slug);
        }
      });
    });
  </script>
  <?php if (isset($courses) && is_array($courses)) { ?>
  <script>
    $(document).ready(function() {
      // Auto slug generator
      <?php foreach ($courses as $key => $value) { ?>
        $('#course-judul-edit<?= $value->id ?>').on('input', function() {
            if (!$('#course-id-edit<?= $value->id ?>').val()) {
            const slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            $('#course-slug-edit<?= $value->id ?>').val(slug);
            }
        });
      <?php }?>
    });
  </script>
  <?php } ?>
  
  <script>
    $(document).ready(function() {
      // Auto slug generator
      $('#lesson-judul').on('input', function() {
        if (!$('#lesson-id').val()) {
          const slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
          $('#lesson-slug').val(slug);
        }
      });
    });
  </script>

  <?php if (isset($lessons) && is_array($lessons)) { ?>
  <script>
    $(document).ready(function() {
      // Auto slug generator for edit modals
      <?php foreach ($lessons as $key => $value) { ?>
        $('#lesson-judul-edit<?= $value->id ?>').on('input', function() {
            if (!$('#lesson-id-edit<?= $value->id ?>').val()) {
            const slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            $('#lesson-slug-edit<?= $value->id ?>').val(slug);
            }
        });
      <?php }?>
    });
  </script>
  <?php } ?>
  <script>
    $(document).ready(function() {
      // Auto slug generator
      $('#cat-name').on('input', function() {
        if (!$('#category-id').val()) {
          const slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
          $('#cat-slug').val(slug);
        }
      });

      // Click event for selecting a FontAwesome icon example
      $(document).on('click', '.select-icon-badge', function() {
        const icon = $(this).attr('data-icon');
        $('#cat-icon').val(icon);
      });

      // Edit category button click
      $('.edit-cat-btn').on('click', function() {
        const id = $(this).attr('data-id');
        const name = $(this).attr('data-name');
        const slug = $(this).attr('data-slug');
        const icon = $(this).attr('data-icon');

        $('#category-id').val(id);
        $('#cat-name').val(name);
        $('#cat-slug').val(slug);
        $('#cat-icon').val(icon);
        
        $('#categoryModalLabel').text('Edit Kategori');
        $('#categoryModal').modal('show');
      });

      // Reset category form when adding new category
      $('#add-category-btn').on('click', function() {
        $('#category-id').val('');
        $('#category-form')[0].reset();
        $('#categoryModalLabel').text('Tambah Kategori');
      });
    });
  </script>
    <script>
    $(document).ready(function() {
      // Course list page filter
      if ($('#courses-tbody').length > 0) {
        const itemsPerPage = 10;
        let currentPage = 1;
        let filteredRows = [];

        function filterCourses() {
          const searchQuery = $('.table-search-input').val().toLowerCase().trim();
          const selectedCategory = $('#filter-category').val();
          
          filteredRows = [];
          const rows = $('#courses-tbody tr:not(.no-results-row)');
          
          rows.each(function() {
            const row = $(this);
            const courseCategory = row.find('td:nth-child(3)').text().trim();
            const courseTitle = row.find('td:nth-child(2) h6').text().trim().toLowerCase();
            const courseSlug = row.find('td:nth-child(2) span').text().replace('URL:', '').trim().toLowerCase();
            
            const matchesSearch = courseTitle.includes(searchQuery) || courseSlug.includes(searchQuery);
            const matchesCategory = (selectedCategory === 'all' || courseCategory === selectedCategory);
            
            if (matchesSearch && matchesCategory) {
              filteredRows.push(row);
            } else {
              row.hide();
            }
          });
          
          const totalItems = filteredRows.length;
          const totalPages = Math.ceil(totalItems / itemsPerPage);

          if (currentPage > totalPages) {
            currentPage = Math.max(1, totalPages);
          }

          const startIndex = (currentPage - 1) * itemsPerPage;
          const endIndex = startIndex + itemsPerPage;

          filteredRows.forEach((row, index) => {
            if (index >= startIndex && index < endIndex) {
              row.show();
            } else {
              row.hide();
            }
          });

          // Update page info text
          const info = $('#courses-page-info');
          if (totalItems > 0) {
            info.text(`Showing ${startIndex + 1} to ${Math.min(endIndex, totalItems)} of ${totalItems} entries`);
          } else {
            info.text('Showing 0 to 0 of 0 entries');
          }

          // Handle pagination controls
          renderCoursePagination(totalPages);

          let noResultsRow = $('#courses-tbody .no-results-row');
          if (totalItems === 0) {
            if (noResultsRow.length === 0) {
              noResultsRow = $('<tr class="no-results-row"><td colspan="5" class="text-center py-4 text-muted small"><i class="fa-solid fa-face-frown me-1 fs-5 d-block mb-2 text-gold"></i>Tidak ada data yang cocok dengan filter.</td></tr>');
              $('#courses-tbody').append(noResultsRow);
            } else {
              noResultsRow.show();
            }
          } else {
            noResultsRow.hide();
          }
        }

        function renderCoursePagination(totalPages) {
          const container = $('#courses-pagination');
          container.empty();

          if (totalPages <= 1) {
            $('#courses-pagination-wrapper').addClass('d-none');
            return;
          }
          $('#courses-pagination-wrapper').removeClass('d-none');

          // Previous button
          const prevLi = $(`<li class="page-item ${currentPage === 1 ? 'disabled' : ''}"><a class="page-link" href="#" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></a></li>`);
          prevLi.on('click', function(e) {
            e.preventDefault();
            if (currentPage > 1) {
              currentPage--;
              filterCourses();
            }
          });
          container.append(prevLi);

          // Page numbers
          for (let i = 1; i <= totalPages; i++) {
            const pageLi = $(`<li class="page-item ${currentPage === i ? 'active' : ''}"><a class="page-link" href="#">${i}</a></li>`);
            pageLi.on('click', function(e) {
              e.preventDefault();
              currentPage = i;
              filterCourses();
            });
            container.append(pageLi);
          }

          // Next button
          const nextLi = $(`<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}"><a class="page-link" href="#" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></a></li>`);
          nextLi.on('click', function(e) {
            e.preventDefault();
            if (currentPage < totalPages) {
              currentPage++;
              filterCourses();
            }
          });
          container.append(nextLi);
        }

        $('.table-search-input').off('input').on('input', function() {
          currentPage = 1;
          filterCourses();
        });
        $('#filter-category').on('change', function() {
          currentPage = 1;
          filterCourses();
        });

        // Init courses filter on load
        filterCourses();
      }

      // Lessons list page filter
      if ($('#lessons-tbody').length > 0) {
        const itemsPerPage = 10;
        let currentPage = 1;
        let filteredRows = [];

        function filterLessons() {
          const searchQuery = $('.table-search-input').val().toLowerCase().trim();
          const selectedCourse = $('#filter-course').val();
          
          filteredRows = [];
          const rows = $('#lessons-tbody tr:not(.no-results-row)');
          
          rows.each(function() {
            const row = $(this);
            const courseTitle = row.find('td:first-child .badge').text().trim();
            
            const lessonTitle = row.find('td:nth-child(2) h6').text().trim().toLowerCase();
            const lessonSlug = row.find('td:nth-child(2) span').text().replace('Slug:', '').trim().toLowerCase();
            const youtubeId = row.find('td:nth-child(3) code').text().trim().toLowerCase();
            
            const matchesSearch = lessonTitle.includes(searchQuery) || lessonSlug.includes(searchQuery) || youtubeId.includes(searchQuery);
            const matchesCourse = (selectedCourse === 'all' || courseTitle === selectedCourse);
            
            if (matchesSearch && matchesCourse) {
              filteredRows.push(row);
            } else {
              row.hide();
            }
          });
          
          const totalItems = filteredRows.length;
          const totalPages = Math.ceil(totalItems / itemsPerPage);

          if (currentPage > totalPages) {
            currentPage = Math.max(1, totalPages);
          }

          const startIndex = (currentPage - 1) * itemsPerPage;
          const endIndex = startIndex + itemsPerPage;

          filteredRows.forEach((row, index) => {
            if (index >= startIndex && index < endIndex) {
              row.show();
            } else {
              row.hide();
            }
          });

          // Update page info text
          const info = $('#lessons-page-info');
          if (totalItems > 0) {
            info.text(`Showing ${startIndex + 1} to ${Math.min(endIndex, totalItems)} of ${totalItems} entries`);
          } else {
            info.text('Showing 0 to 0 of 0 entries');
          }

          // Handle pagination controls
          renderLessonPagination(totalPages);

          let noResultsRow = $('#lessons-tbody .no-results-row');
          if (totalItems === 0) {
            if (noResultsRow.length === 0) {
              noResultsRow = $('<tr class="no-results-row"><td colspan="5" class="text-center py-4 text-muted small"><i class="fa-solid fa-face-frown me-1 fs-5 d-block mb-2 text-gold"></i>Tidak ada data yang cocok dengan filter.</td></tr>');
              $('#lessons-tbody').append(noResultsRow);
            } else {
              noResultsRow.show();
            }
          } else {
            noResultsRow.hide();
          }
        }

        function renderLessonPagination(totalPages) {
          const container = $('#lessons-pagination');
          container.empty();

          if (totalPages <= 1) {
            $('#lessons-pagination-wrapper').addClass('d-none');
            return;
          }
          $('#lessons-pagination-wrapper').removeClass('d-none');

          // Previous button
          const prevLi = $(`<li class="page-item ${currentPage === 1 ? 'disabled' : ''}"><a class="page-link" href="#" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></a></li>`);
          prevLi.on('click', function(e) {
            e.preventDefault();
            if (currentPage > 1) {
              currentPage--;
              filterLessons();
            }
          });
          container.append(prevLi);

          // Page numbers
          for (let i = 1; i <= totalPages; i++) {
            const pageLi = $(`<li class="page-item ${currentPage === i ? 'active' : ''}"><a class="page-link" href="#">${i}</a></li>`);
            pageLi.on('click', function(e) {
              e.preventDefault();
              currentPage = i;
              filterLessons();
            });
            container.append(pageLi);
          }

          // Next button
          const nextLi = $(`<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}"><a class="page-link" href="#" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></a></li>`);
          nextLi.on('click', function(e) {
            e.preventDefault();
            if (currentPage < totalPages) {
              currentPage++;
              filterLessons();
            }
          });
          container.append(nextLi);
        }

        $('.table-search-input').off('input').on('input', function() {
          currentPage = 1;
          filterLessons();
        });
        $('#filter-course').on('change', function() {
          currentPage = 1;
          filterLessons();
        });

        // Init lessons filter on load
        filterLessons();
      }
    });
  </script>
</body>
</html>