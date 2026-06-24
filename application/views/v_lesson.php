<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ruang Belajar - AL Faiz</title>
  <link href="<?= base_url()?>assets/img/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <!-- Google Fonts & Bootstrap 5 & FontAwesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/assets/css/style.css">
</head>
<body class="bg-light-custom">
    <?php foreach ($lessons as $key => $value) {
        if ($value->slug == $slugurl) {
            $judulCourse = $value->judul_course; 
            $slugCourse = $value->slug_course;
            $judulMateri = $value->judul; 
            $slugMateri = $value->slug; 
            $urutanMateri = $value->urutan; 
            $videoMateri = $value->video_youtube; 
            $linkMateri = $value->pdf; 
            $deskripsiMateri = $value->deskripsi; 
            $idMateri = $value->id; 
            $idCourse = $value->course_id; 
        }
    } ?>
  <!-- Minimal Header -->
  <nav class="navbar navbar-expand-lg navbar-custom sticky-top py-3">
    <div class="container-fluid px-lg-5">
      <a class="btn btn-outline-secondary btn-sm rounded-pill font-heading" id="back-to-course-btn" href="<?= base_url() ?>course_detail?slug=<?= $slugCourse ?>">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Kelas
      </a>
      
      <span class="navbar-brand font-heading text-primary-custom ms-3 me-auto d-none d-md-inline-block" style="font-weight: 800; font-size: 1.25rem;">
        <?= $judulCourse ?>
      </span>

      <div class="d-flex align-items-center gap-3">
        <!-- Dark Mode Toggle -->
        <a href="#" class="theme-toggle-btn text-dark-emphasis p-2" title="Ganti Mode">
          <i class="theme-toggle-icon fa-solid fa-moon fs-5"></i>
        </a>
        
        <div id="user-nav-items" class="dropdown">
          <a class="d-flex align-items-center text-decoration-none dropdown-toggle gap-2" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img id="nav-user-avatar" src="<?= $this->session->userdata('foto') ? $this->session->userdata('foto') : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60' ?>" alt="Avatar" class="rounded-circle" style="width: 38px; height: 38px; object-fit: cover;">
            <span id="nav-user-name" class="fw-semibold text-color d-none d-sm-inline"><?= $this->session->userdata('nama') ? $this->session->userdata('nama') : 'Budi Pratama' ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2" aria-labelledby="profileDropdown" style="background-color: var(--card-bg);">
            <li><a class="dropdown-item py-2 fw-medium" href="<?= base_url('dashboard') ?>"><i class="fa-solid fa-gauge me-2 text-primary-custom"></i>Dashboard Saya</a></li>
            <li><a class="dropdown-item py-2 fw-medium" href="<?= base_url('courses') ?>"><i class="fa-solid fa-book-open me-2 text-primary-custom"></i>Kelas Saya</a></li>
            <li><hr class="dropdown-divider border-secondary-subtle"></li>
            <li><a class="dropdown-item py-2 fw-medium text-danger" href="<?= base_url('auth/logout') ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Classroom Workspace -->
  <main class="py-4">
    <div class="container-fluid px-lg-5">
      <div class="row g-4">
        <!-- Learning Frame (Left) -->
        <div class="col-xl-8 col-lg-7">
          
          <!-- Video Section -->
          <div class="lesson-video-container mb-3">
            <iframe id="video-iframe" src="https://www.youtube.com/embed/<?= $videoMateri ?>" allowfullscreen></iframe>
          </div>

          <!-- Video Controls / Details -->
          <div class="p-4 border border-color rounded-3 bg-white mb-4" style="background-color: var(--card-bg);">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-3 pb-3 border-bottom border-secondary-subtle">
              <div>
                <span class="badge bg-gold-custom text-white mb-2">Materi <?= $urutanMateri ?></span>
                <h1 class="font-heading h4 mb-0"><?= $judulMateri ?></h1>
              </div>
              
              <!-- Completion & Bookmark Actions -->
              <div class="d-flex gap-2 w-100 w-sm-auto justify-content-sm-end" id="user-interaction-panel">
                <button class="btn <?= $is_bookmarked ? 'btn-outline-gold' : 'btn-outline-secondary' ?> btn-sm px-3" id="bookmark-btn" style="<?= $is_bookmarked ? 'color: var(--gold);' : '' ?>">
                  <i class="<?= $is_bookmarked ? 'fa-solid' : 'fa-regular' ?> fa-bookmark me-1" id="bookmark-icon"></i> Bookmark
                </button>
                <button class="btn <?= $is_completed ? 'btn-success bg-success' : 'btn-primary-custom bg-primary-custom' ?> btn-sm px-3 border-0" id="complete-btn">
                  <i class="<?= $is_completed ? 'fa-solid' : 'fa-regular' ?> fa-circle-check me-1" id="complete-icon"></i> <?= $is_completed ? 'Selesai' : 'Tandai Selesai' ?>
                </button>
              </div>
            </div>

            <!-- Lesson Description -->
            <div class="mb-4">
              <h5 class="font-heading h6 text-muted mb-2">Tentang Materi Ini</h5>
              <p class="text-muted small mb-0" id="lesson-desc" style="line-height: 1.6;">
                <?= $deskripsiMateri ?>
              </p>
            </div>

            <!-- PDF Material Panel -->
            <div class="p-3 bg-light border border-color rounded-3 d-flex justify-content-between align-items-center" style="background-color: var(--light);" id="pdf-resource-panel">
              <div class="d-flex align-items-center">
                <div class="fs-1 text-danger me-3"><i class="fa-solid fa-file-pdf"></i></div>
                <div>
                  <h6 class="mb-0 text-color fw-medium small"><?= $judulMateri ?></h6>
                  <span class="text-muted small" style="font-size:0.75rem;"><?= $deskripsiMateri ?></span>
                </div>
              </div>
              
              <div id="pdf-action-container">
                <a href="<?= base_url($linkMateri) ?>" target="_blank" download class="btn btn-danger btn-sm"><i class="fa-solid fa-download me-1"></i> Unduh PDF</a>
              </div>
            </div>
          </div>

          <!-- Discussion Section -->
          <div class="p-4 border border-color rounded-3 bg-white" style="background-color: var(--card-bg);">
            <h3 class="font-heading h5 mb-3 border-bottom pb-2"><i class="fa-solid fa-comments me-2 text-primary-custom"></i>Diskusi & Komentar</h3>
            
            <!-- Comment Input Box -->
            <div id="comment-input-area" class="mb-4">
              <div class="d-flex gap-3">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" class="comment-avatar" alt="Avatar">
                <div class="flex-grow-1">
                  <div class="input-group">
                    <textarea class="form-control form-control-custom" rows="2" placeholder="Tulis komentar atau pertanyaan Anda..." id="main-comment-text"></textarea>
                  </div>
                  <div class="text-end mt-2">
                    <button class="btn btn-primary-custom btn-sm px-4 border-0 bg-primary-custom text-white" id="submit-comment-btn">Kirim Komentar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- List Comments -->
            <div class="comment-list" id="comments-container">
              <!-- Comment 1 -->
              <div class="d-flex gap-3 comment-item" id="comment-1">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" class="comment-avatar mt-1" alt="Avatar">
                <div class="flex-grow-1">
                  <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-semibold text-color small">Budi Pratama</h6>
                    <span class="text-muted small" style="font-size:0.75rem;">22 Juni 2026 10:30</span>
                  </div>
                  <p class="text-muted small mb-0 mt-1">Sangat membantu kak pembahasannya! Jadi paham konsep Silogisme.</p>
                  
                  <div class="mt-2 d-flex gap-2">
                    <button class="btn btn-link btn-sm text-gold p-0 text-decoration-none"><i class="fa-solid fa-reply me-1"></i> Balas</button>
                  </div>
                  
                  <!-- Replies -->
                  <div class="reply-list">
                    <div class="d-flex gap-3 mt-3 comment-item">
                      <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=60" class="comment-avatar mt-1" alt="Avatar">
                      <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                          <h6 class="mb-0 fw-semibold text-color small">Al Faiz Admin <span class="badge bg-danger text-white small" style="font-size:0.6rem; vertical-align:middle; padding:3px 6px;">ADMIN</span></h6>
                          <span class="text-muted small" style="font-size:0.75rem;">22 Juni 2026 11:00</span>
                        </div>
                        <p class="text-muted small mb-0 mt-1">Sama-sama Budi! Semangat terus belajarnya ya, persiapkan matang-matang.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Comment 2 -->
              <div class="d-flex gap-3 comment-item mt-3 pt-3 border-top border-secondary-subtle" id="comment-2">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" class="comment-avatar mt-1" alt="Avatar">
                <div class="flex-grow-1">
                  <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-semibold text-color small">Budi Pratama</h6>
                    <span class="text-muted small" style="font-size:0.75rem;">23 Juni 2026 08:15</span>
                  </div>
                  <p class="text-muted small mb-0 mt-1">Kak, apakah ada PDF latihan soal tambahannya?</p>
                  <div class="mt-2 d-flex gap-2">
                    <button class="btn btn-link btn-sm text-gold p-0 text-decoration-none"><i class="fa-solid fa-reply me-1"></i> Balas</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Syllabus Sidebar (Right) -->
        <div class="col-xl-4 col-lg-5">
          <div class="lesson-sidebar">
            <div class="lesson-sidebar-header">
              <h4 class="font-heading h6 mb-1 text-color">Daftar Materi Kelas</h4>
              <p class="text-muted small mb-0" id="sidebar-course-progress">Progress Kelas: <?= $progress_percent ?>% selesai</p>
            </div>
            
            <div class="lesson-list" id="sidebar-lesson-list">
              <?php foreach($lessons as $key => $value) { ?>
                <?php if ($value->course_id == $idCourse) { ?>
                    <?php $active = ($value->id == $idMateri) ? 'active' : ''; ?>
                    <?php $activeIcon = ($value->id == $idMateri) ? 'text-primary-custom' : 'text-muted'; ?>
                    <?php $isLessonCompleted = in_array($value->id, $completed_ids); ?>
                    <a href="<?= base_url() ?>lesson?slug=<?= $value->slug ?>" class="lesson-item <?= $active ?>" data-lesson-id="<?= $value->id ?>">
                        <i class="fa-solid <?= $isLessonCompleted ? 'fa-circle-check text-success' : 'fa-circle-play ' . $activeIcon ?> status-icon"></i>
                        <div class="small">
                        <div class="fw-medium text-color"><?= $value->judul ?></div>
                        <span class="text-muted" style="font-size:0.75rem;"><i class="fa-solid fa-clock me-1"></i> 15 Menit</span>
                        </div>
                    </a>
                <?php } ?>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- JS Dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>template/assets/js/app.js"></script>
  <script>
    $(document).ready(function() {
      // Bookmark AJAX Toggle
      $('#bookmark-btn').on('click', function() {
        const btn = $(this);
        const icon = $('#bookmark-icon');
        $.post('<?= base_url("lesson/toggle_bookmark") ?>', {
          lesson_id: '<?= $idMateri ?>'
        }, function(response) {
          const res = JSON.parse(response);
          if (res.status === 'success') {
            if (res.action === 'bookmarked') {
              icon.removeClass('fa-regular').addClass('fa-solid');
              btn.removeClass('btn-outline-secondary').addClass('btn-outline-gold').css('color', 'var(--gold)');
            } else {
              icon.removeClass('fa-solid').addClass('fa-regular');
              btn.removeClass('btn-outline-gold').addClass('btn-outline-secondary').css('color', '');
            }
          }
        });
      });

      // Complete AJAX Toggle
      $('#complete-btn').on('click', function() {
        const btn = $(this);
        const icon = $('#complete-icon');
        $.post('<?= base_url("lesson/toggle_complete") ?>', {
          lesson_id: '<?= $idMateri ?>',
          course_id: '<?= $idCourse ?>'
        }, function(response) {
          const res = JSON.parse(response);
          if (res.status === 'success') {
            if (res.action === 'completed') {
              btn.removeClass('btn-primary-custom bg-primary-custom').addClass('btn-success bg-success')
                 .html('<i class="fa-solid fa-circle-check me-1" id="complete-icon"></i> Selesai');
              $(`.lesson-item[data-lesson-id="<?= $idMateri ?>"] .status-icon`)
                 .removeClass('fa-circle-play text-primary-custom')
                 .addClass('fa-circle-check text-success');
            } else {
              btn.removeClass('btn-success bg-success').addClass('btn-primary-custom bg-primary-custom')
                 .html('<i class="fa-regular fa-circle-check me-1" id="complete-icon"></i> Tandai Selesai');
              $(`.lesson-item[data-lesson-id="<?= $idMateri ?>"] .status-icon`)
                 .removeClass('fa-circle-check text-success')
                 .addClass('fa-circle-play text-primary-custom');
            }
            $('#sidebar-course-progress').text(`Progress Kelas: ${res.progress_percent}% selesai`);
          }
        });
      });

      // Mock Comments Adding
      $('#submit-comment-btn').on('click', function() {
        const text = $('#main-comment-text').val().trim();
        if (text) {
          const date = new Date().toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
          });

          const newComment = `
            <div class="d-flex gap-3 comment-item mt-3 pt-3 border-top border-secondary-subtle">
              <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60" class="comment-avatar mt-1" alt="Avatar">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-center">
                  <h6 class="mb-0 fw-semibold text-color small">Budi Pratama</h6>
                  <span class="text-muted small" style="font-size:0.75rem;">${date}</span>
                </div>
                <p class="text-muted small mb-0 mt-1">${text}</p>
              </div>
            </div>
          `;
          $('#comments-container').prepend(newComment);
          $('#main-comment-text').val('');
        }
      });
    });
  </script>
</body>
</html>
