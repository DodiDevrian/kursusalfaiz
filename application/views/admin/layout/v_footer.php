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
</body>
</html>