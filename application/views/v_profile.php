      <?php foreach ($profile as $key => $value) {
        if ($this->session->userdata('id_user') == $value->id_user) {
            $id_user = $value->id_user;
            $nama = $value->nama;
            $foto = $value->foto;
            $email = $value->email;
        }
    } ?>
      <div class="col-lg-9 col-md-8 p-4 p-lg-5">
        <div class="mb-4">
          <span class="text-gold font-heading fw-semibold small" style="letter-spacing: 1px;">PENGATURAN AKUN</span>
          <h1 class="font-heading h3 text-color">Profil Saya</h1>
          <p class="text-muted small">Kelola informasi profil, email, dan kata sandi keamanan Anda.</p>
        </div>

        <div class="row g-4">
          <!-- Edit Profile (Col 1) -->
          <div class="col-lg-6">
            <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
              <h3 class="font-heading h5 mb-3 border-bottom pb-2">Informasi Profil</h3>
              
              <div id="profile-alert" class="alert alert-success d-none" role="alert"></div>

              <form id="profile-form" action="<?= base_url('profile/update/').$id_user ?>" method="post">
                <div class="mb-3">
                  <label for="profile-nama" class="form-label small text-muted">Nama Lengkap</label>
                  <input type="text" class="form-control form-control-custom" id="profile-nama" name="nama" value="<?= $nama ?>" required>
                </div>
                <div class="mb-3">
                  <label for="profile-email" class="form-label small text-muted">Alamat Email</label>
                  <input type="email" class="form-control form-control-custom" id="profile-email" name="email" value="<?= $email ?>" required>
                </div>
                <div class="mb-3">
                  <label class="form-label small text-muted d-block">Foto Profil</label>
                  <div class="d-flex align-items-center gap-3">
                    <img id="form-avatar-preview" src="<?= $foto ? $foto : 'https://res.cloudinary.com/dhtspwbzr/image/upload/v1782363994/3da39-no-user-image-icon-27_thxfzr.png' ?>" class="rounded-circle border border-secondary-subtle" style="width: 55px; height: 55px; object-fit: cover;" alt="Avatar Preview">
                    <input type="text" class="form-control form-control-custom small" id="profile-photo-url" name="foto" value="<?= $foto ? $foto : 'https://res.cloudinary.com/dhtspwbzr/image/upload/v1782363994/3da39-no-user-image-icon-27_thxfzr.png' ?>" placeholder="Masukkan URL Foto Baru">
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary-custom py-2 px-4 border-0 bg-primary-custom text-white font-heading mt-2">SIMPAN PERUBAHAN</button>
              </form>
            </div>
          </div>

          <!-- Change Password (Col 2) -->
          <div class="col-lg-6">
            <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
              <h3 class="font-heading h5 mb-3 border-bottom pb-2">Ganti Kata Sandi</h3>
              
              <div id="password-alert" class="alert d-none" role="alert"></div>

              <form id="password-form">
                <div class="mb-3">
                  <label for="old-pass" class="form-label small text-muted">Kata Sandi Lama</label>
                  <input type="password" class="form-control form-control-custom" id="old-pass" placeholder="••••••••" required>
                </div>
                <div class="mb-3">
                  <label for="new-pass" class="form-label small text-muted">Kata Sandi Baru</label>
                  <input type="password" class="form-control form-control-custom" id="new-pass" minlength="6" placeholder="Min. 6 karakter" required>
                </div>
                <div class="mb-3">
                  <label for="confirm-new-pass" class="form-label small text-muted">Ulangi Kata Sandi Baru</label>
                  <input type="password" class="form-control form-control-custom" id="confirm-new-pass" minlength="6" placeholder="Ulangi kata sandi baru" required>
                </div>
                
                <button type="submit" class="btn btn-gold-custom py-2 px-4 border-0 bg-gold-custom text-white font-heading mt-2">GANTI KATA SANDI</button>
              </form>
            </div>
          </div>
        </div>

      </div>

