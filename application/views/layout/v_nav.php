      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
          <li class="nav-item">
            <a class="nav-link <?php echo menuAktif('home') ?> fw-medium" href="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo menuAktif('courses'); if($this->uri->segment(1) == 'course_detail') { echo 'active'; } ?> fw-medium" href="courses">Daftar Kelas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo menuAktif('about') ?> fw-medium" href="home#about">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium <?php echo menuAktif('faq') ?>" href="home#faq">FAQ</a>
          </li>
        </ul>
        
        <!-- Auth Actions / Profile -->
        <div class="d-flex align-items-center gap-3">
          <!-- Dark Mode Toggle -->
          <a href="#" class="theme-toggle-btn text-dark-emphasis p-2" title="Ganti Mode">
            <i class="theme-toggle-icon fa-solid fa-moon fs-5"></i>
          </a>
          
          <!-- Guest / User Session Actions -->
          <?php if ($this->session->userdata('id_user')) { ?>
            <div id="user-nav-items" class="dropdown">
              <a class="d-flex align-items-center text-decoration-none dropdown-toggle gap-2" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img id="nav-user-avatar" src="<?= $this->session->userdata('foto') ? $this->session->userdata('foto') : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60' ?>" alt="Avatar" class="rounded-circle" style="width: 38px; height: 38px; object-fit: cover;">
                <span id="nav-user-name" class="fw-semibold text-color d-none d-sm-inline"><?= $this->session->userdata('nama') ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2" aria-labelledby="profileDropdown" style="background-color: var(--card-bg);">
                <li><a class="dropdown-item py-2 fw-medium" href="<?= base_url('dashboard') ?>"><i class="fa-solid fa-gauge me-2 text-primary-custom"></i>Dashboard Saya</a></li>
                <li><a class="dropdown-item py-2 fw-medium" href="<?= base_url('courses') ?>"><i class="fa-solid fa-book-open me-2 text-primary-custom"></i>Kelas Saya</a></li>
                <li><hr class="dropdown-divider border-secondary-subtle"></li>
                <li><a class="dropdown-item py-2 fw-medium text-danger" href="<?= base_url('auth/logout') ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
              </ul>
            </div>
          <?php } else { ?>
            <!-- Guest View -->
            <div id="guest-nav-items" class="d-flex gap-2">
              <a href="<?php echo base_url('register') ?>" class="btn btn-outline-primary-custom px-4 py-2 border-0">Daftar</a>
              <a href="<?php echo base_url('auth/login') ?>" class="btn btn-primary-custom px-4 py-2 border-0">Masuk</a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>