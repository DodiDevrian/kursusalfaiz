    </div>
  </div>

  <!-- JS Dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('template/assets/js/app.js') ?>"></script>
  <script>
    $(document).ready(function() {
      // Form password submit simulation
      $('#password-form').on('submit', function(e) {
        e.preventDefault();
        const newPass = $('#new-pass').val();
        const confirmPass = $('#confirm-new-pass').val();

        if (newPass !== confirmPass) {
          $('#password-alert').removeClass('d-none alert-success').addClass('alert-danger').text("Konfirmasi kata sandi tidak cocok.");
          return;
        }

        $('#password-alert').removeClass('d-none alert-danger').addClass('alert-success').text("Kata sandi berhasil diperbarui (Simulasi)!");
        $('#password-form')[0].reset();
      });
    });
  </script>
</body>
</html>