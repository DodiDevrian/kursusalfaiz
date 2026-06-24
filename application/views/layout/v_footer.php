  <!-- 10. Footer -->
  <footer class="footer-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h4 class="font-heading text-white mb-3" style="letter-spacing: 1.5px;">AL <span class="text-gold">FAIZ</span></h4>
          <p class="text-white-50">Platform bimbingan belajar gratis terkemuka di Indonesia yang mendidik ribuan pejuang PTN dan Aparatur Sipil Negara.</p>
          <div class="d-flex gap-3 fs-5 mt-4">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube text-danger"></i></a>
            <a href="#"><i class="fa-brands fa-telegram text-info"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h5>Program Belajar</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="courses.html?category=utbk">UTBK SNBT</a></li>
            <li class="mb-2"><a href="courses.html?category=skd">SKD Kedinasan</a></li>
            <li class="mb-2"><a href="courses.html?category=cpns">CPNS 2026</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h5>Halaman Utama</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="courses.html">Semua Kelas</a></li>
            <li class="mb-2"><a href="#about">Tentang Kami</a></li>
            <li class="mb-2"><a href="#faq">FAQ Tanya Jawab</a></li>
            <li class="mb-2"><a href="admin-login.html">Login Admin</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <h5>Hubungi Kami</h5>
          <p class="text-white-50 mb-2"><i class="fa-solid fa-envelope me-2 text-gold"></i> dodidevrian24@gmail.com</p>
          <p class="text-white-50 mb-2"><i class="fa-solid fa-phone me-2 text-gold"></i> +62 896-2874-4896</p>
          <p class="text-white-50 mb-0"><i class="fa-solid fa-location-dot me-2 text-gold"></i> Bandar Jaya, Terbanggi Besar, Lampung Tengah, Lampung</p>
        </div>
      </div>
      <div class="footer-bottom text-center">
        <p class="text-white-50 small mb-0">© 2026 AL Faiz. All rights reserved. Platform Pembelajaran Gratis Terkemuka di Indonesia.</p>
      </div>
    </div>
  </footer>

  <!-- JS Dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url()?>template/assets/js/app.js"></script>

  <script>
    $(document).ready(function() {
      // Check query params for category selection on load
      const urlParams = new URLSearchParams(window.location.search);
      const catParam = urlParams.get('category');
      
      if (catParam) {
        $('.btn-filter').removeClass('active');
        $(`.btn-filter[data-category="${catParam}"]`).addClass('active');
        applyFilter(catParam);
      }

      function applyFilter(category) {
        if (category === 'all') {
          $('.course-item-card').removeClass('d-none');
        } else {
          $('.course-item-card').addClass('d-none');
          $(`.course-item-card[data-category="${category}"]`).removeClass('d-none');
        }
        
        checkEmptyState();
      }

      function checkEmptyState() {
        const visibleCount = $('.course-item-card:visible').length;
        if (visibleCount === 0) {
          $('#empty-state').removeClass('d-none');
        } else {
          $('#empty-state').addClass('d-none');
        }
      }

      // Filter clicks
      $('.btn-filter').on('click', function() {
        $('.btn-filter').removeClass('active');
        $(this).addClass('active');
        const cat = $(this).attr('data-category');
        applyFilter(cat);
      });

      // Search box simple local filter
      $('#search-btn').on('click', searchCourses);
      $('#search-input').on('keyup', function(e) {
        searchCourses();
      });

      function searchCourses() {
        const query = $('#search-input').val().toLowerCase().trim();
        const activeCat = $('.btn-filter.active').attr('data-category');

        $('.course-item-card').each(function() {
          const title = $(this).find('h4').text().toLowerCase();
          const desc = $(this).find('p').text().toLowerCase();
          const matchesQuery = title.includes(query) || desc.includes(query);
          
          const matchesCat = activeCat === 'all' || $(this).attr('data-category') === activeCat;

          if (matchesQuery && matchesCat) {
            $(this).removeClass('d-none');
          } else {
            $(this).addClass('d-none');
          }
        });

        checkEmptyState();
      }
    });
  </script>
</body>
</html>