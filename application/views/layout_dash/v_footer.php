    </div>
  </div>

  <!-- JS Dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('template/assets/js/app.js') ?>"></script>
  <script>
    $(document).ready(function() {
      // Form password submit
      $('#password-form').on('submit', function(e) {
        e.preventDefault();
        const oldPass = $('#old-pass').val();
        const newPass = $('#new-pass').val();
        const confirmPass = $('#confirm-new-pass').val();

        if (newPass !== confirmPass) {
          $('#password-alert').removeClass('d-none alert-success').addClass('alert-danger').text("Konfirmasi kata sandi tidak cocok.");
          return;
        }

        $.ajax({
          url: '<?= base_url("profile/change_password") ?>',
          type: 'POST',
          dataType: 'json',
          data: {
            old_password: oldPass,
            new_password: newPass,
            confirm_new_password: confirmPass
          },
          success: function(response) {
            if (response.status === 'success') {
              $('#password-alert').removeClass('d-none alert-danger').addClass('alert-success').text(response.message);
              $('#password-form')[0].reset();
            } else {
              $('#password-alert').removeClass('d-none alert-success').addClass('alert-danger').text(response.message);
            }
          },
          error: function() {
            $('#password-alert').removeClass('d-none alert-success').addClass('alert-danger').text("Terjadi kesalahan sistem. Silakan coba lagi.");
          }
        });
      });
    });
  </script>
</body>
</html>