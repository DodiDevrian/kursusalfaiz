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
  <script>
    $(document).ready(function() {
      // Auto slug generator
      $('#lesson-judul').on('input', function() {
        if (!$('#lesson-id').val()) {
          const slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
          $('#lesson-slug').val(slug);
        }
      });

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
        function filterCourses() {
          const searchQuery = $('.table-search-input').val().toLowerCase().trim();
          const selectedCategory = $('#filter-category').val();
          
          const rows = $('#courses-tbody tr:not(.no-results-row)');
          let visibleCount = 0;
          
          rows.each(function() {
            const row = $(this);
            const courseCategory = row.find('td:nth-child(3)').text().trim();
            const courseTitle = row.find('td:nth-child(2) h6').text().trim().toLowerCase();
            const courseSlug = row.find('td:nth-child(2) span').text().replace('URL:', '').trim().toLowerCase();
            
            const matchesSearch = courseTitle.includes(searchQuery) || courseSlug.includes(searchQuery);
            const matchesCategory = (selectedCategory === 'all' || courseCategory === selectedCategory);
            
            if (matchesSearch && matchesCategory) {
              row.show();
              visibleCount++;
            } else {
              row.hide();
            }
          });
          
          let noResultsRow = $('#courses-tbody .no-results-row');
          if (visibleCount === 0) {
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
        
        $('.table-search-input').off('input').on('input', filterCourses);
        $('#filter-category').on('change', filterCourses);
      }

      // Lessons list page filter
      if ($('#lessons-tbody').length > 0) {
        function filterLessons() {
          const searchQuery = $('.table-search-input').val().toLowerCase().trim();
          const selectedCourse = $('#filter-course').val();
          
          const rows = $('#lessons-tbody tr:not(.no-results-row)');
          let visibleCount = 0;
          
          rows.each(function() {
            const row = $(this);
            const courseTitle = row.find('td:first-child .badge').text().trim();
            
            const lessonTitle = row.find('td:nth-child(2) h6').text().trim().toLowerCase();
            const lessonSlug = row.find('td:nth-child(2) span').text().replace('Slug:', '').trim().toLowerCase();
            const youtubeId = row.find('td:nth-child(3) code').text().trim().toLowerCase();
            
            const matchesSearch = lessonTitle.includes(searchQuery) || lessonSlug.includes(searchQuery) || youtubeId.includes(searchQuery);
            const matchesCourse = (selectedCourse === 'all' || courseTitle === selectedCourse);
            
            if (matchesSearch && matchesCourse) {
              row.show();
              visibleCount++;
            } else {
              row.hide();
            }
          });
          
          let noResultsRow = $('#lessons-tbody .no-results-row');
          if (visibleCount === 0) {
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
        
        $('.table-search-input').off('input').on('input', filterLessons);
        $('#filter-course').on('change', filterLessons);
      }
    });
  </script>
</body>
</html>