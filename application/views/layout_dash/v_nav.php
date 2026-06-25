<?php foreach ($profile as $key => $value) {
    if ($this->session->userdata('id_user') == $value->id_user) {
        $id_user = $value->id_user;
        $nama = $value->nama;
        $foto = $value->foto;
    }
} ?>
  <div class="container-fluid px-0">
    <div class="row g-0">
      <!-- Sidebar (Left) -->
      <div class="col-lg-3 col-md-4 sidebar-layout px-0">
        <div class="text-center py-4 border-bottom border-secondary-subtle">
          <img id="sidebar-avatar" src="<?= $foto ? $foto : 'https://res.cloudinary.com/dhtspwbzr/image/upload/v1782363994/3da39-no-user-image-icon-27_thxfzr.png' ?>" alt="Avatar" class="rounded-circle mb-2 border border-3 border-color" style="width: 80px; height: 80px; object-fit: cover;">
          <h5 class="mb-1 font-heading text-color h6" id="sidebar-name"><?= $nama ?></h5>
          <span class="badge bg-gold-custom text-white small">Siswa Al Faiz</span>
        </div>
        
        <div class="py-3">
          <a href="<?= base_url('dashboard') ?>" class="sidebar-link <?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>"><i class="fa-solid fa-gauge"></i> Dashboard Saya</a>
          <a href="<?= base_url('courses') ?>" class="sidebar-link <?php echo $this->uri->segment(1) == 'courses' ? 'active' : '' ?>"><i class="fa-solid fa-book-open"></i> My Learning</a>
          <a href="#" class="sidebar-link"><i class="fa-solid fa-bookmark"></i> Bookmark</a>
          <a href="#" class="sidebar-link"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Belajar</a>
          <a href="<?= base_url('profile') ?>" class="sidebar-link <?php echo $this->uri->segment(1) == 'profile' ? 'active' : '' ?>"><i class="fa-solid fa-user-gear"></i> Profil & Pengaturan</a>
          <hr class="border-secondary-subtle my-2">
          <a href="<?= base_url('auth/logout') ?>" class="sidebar-link text-danger"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
        </div>
      </div>   