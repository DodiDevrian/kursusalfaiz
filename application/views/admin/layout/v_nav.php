  <div class="container-fluid px-0">
    <div class="row g-0">
      <!-- Admin Sidebar (Left) -->
      <div class="col-lg-3 col-md-4 sidebar-layout px-0">
        <div class="text-center py-4 border-bottom border-secondary-subtle">
          <img id="admin-avatar" src="<?= $this->session->userdata('foto') ?>" alt="Avatar" class="rounded-circle mb-2 border border-3 border-danger" style="width: 80px; height: 80px; object-fit: cover;">
          <h5 class="mb-1 font-heading text-color h6" id="admin-name">Al Faiz Admin</h5>
          <span class="badge bg-danger text-white small">Super Admin</span>
        </div>
        
        <div class="py-3">
          <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-link <?php echo menuAktif('dashboard') ?>"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
          <a href="<?= base_url('admin/categories') ?>" class="sidebar-link <?php echo menuAktif('categories') ?>"><i class="fa-solid fa-folder-tree"></i> Kategori</a>
          <a href="<?= base_url('admin/courses') ?>" class="sidebar-link <?php echo menuAktif('courses') ?>"><i class="fa-solid fa-graduation-cap"></i> Course / Kelas</a>
          <a href="<?= base_url('admin/lessons') ?>" class="sidebar-link <?php echo menuAktif('lessons') ?>"><i class="fa-solid fa-book"></i> Materi Pelajaran</a>
          <a href="<?= base_url('admin/user') ?>" class="sidebar-link <?php echo menuAktif('user') ?>"><i class="fa-solid fa-users"></i> Pelajar / User</a>
          <a href="<?= base_url('admin/comments') ?>" class="sidebar-link <?php echo menuAktif('comments') ?>"><i class="fa-solid fa-comments"></i> Komentar</a>
          <a href="<?= base_url('admin/faq') ?>" class="sidebar-link <?php echo menuAktif('faq') ?>"><i class="fa-solid fa-circle-question"></i> FAQ Website</a>
          <hr class="border-secondary-subtle my-2">
          <a href="<?=base_url('auth/logout') ?>" class="sidebar-link text-danger"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
        </div>
      </div>