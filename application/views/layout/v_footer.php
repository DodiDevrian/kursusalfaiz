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
            <li class="mb-2"><a href="courses?category=utbk">UTBK SNBT</a></li>
            <li class="mb-2"><a href="courses?category=skd">SKD Kedinasan</a></li>
            <li class="mb-2"><a href="courses?category=cpns">CPNS 2026</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h5>Halaman Utama</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="courses">Semua Kelas</a></li>
            <li class="mb-2"><a href="home#about">Tentang Kami</a></li>
            <li class="mb-2"><a href="home#faq">FAQ Tanya Jawab</a></li>
            <li class="mb-2"><a href="auth/login">Login Admin</a></li>
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
      const itemsPerPage = 6;
      let currentPage = 1;
      let filteredCards = [];

      // Check query params for category selection on load
      const urlParams = new URLSearchParams(window.location.search);
      const catParam = urlParams.get('category');
      
      if (catParam) {
        $('.btn-filter').removeClass('active');
        $(`.btn-filter[data-category="${catParam}"]`).addClass('active');
      }

      // Initialize
      updatePagination();

      function updatePagination() {
        const query = $('#search-input').val().toLowerCase().trim();
        const activeCat = $('.btn-filter.active').attr('data-category') || 'all';

        filteredCards = [];
        $('.course-item-card').each(function() {
          const card = $(this);
          const title = card.find('h4').text().toLowerCase();
          const desc = card.find('p').text().toLowerCase();
          const matchesQuery = title.includes(query) || desc.includes(query);
          const matchesCat = activeCat === 'all' || card.attr('data-category') === activeCat;

          if (matchesQuery && matchesCat) {
            filteredCards.push(card);
          } else {
            card.addClass('d-none');
          }
        });

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        // Adjust current page if it is out of bounds
        if (currentPage > totalPages) {
          currentPage = Math.max(1, totalPages);
        }

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        filteredCards.forEach((card, index) => {
          if (index >= startIndex && index < endIndex) {
            card.removeClass('d-none');
          } else {
            card.addClass('d-none');
          }
        });

        renderControls(totalPages);
        checkEmptyState();
      }

      function renderControls(totalPages) {
        const container = $('#courses-pagination');
        container.empty();

        if (totalPages <= 1) {
          $('#pagination-wrapper').addClass('d-none');
          return;
        }
        $('#pagination-wrapper').removeClass('d-none');

        // Previous button
        const prevLi = $(`<li class="page-item ${currentPage === 1 ? 'disabled' : ''}"><a class="page-link" href="#" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></a></li>`);
        prevLi.on('click', function(e) {
          e.preventDefault();
          if (currentPage > 1) {
            currentPage--;
            updatePagination();
            scrollToGrid();
          }
        });
        container.append(prevLi);

        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
          const pageLi = $(`<li class="page-item ${currentPage === i ? 'active' : ''}"><a class="page-link" href="#">${i}</a></li>`);
          pageLi.on('click', function(e) {
            e.preventDefault();
            currentPage = i;
            updatePagination();
            scrollToGrid();
          });
          container.append(pageLi);
        }

        // Next button
        const nextLi = $(`<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}"><a class="page-link" href="#" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></a></li>`);
        nextLi.on('click', function(e) {
          e.preventDefault();
          if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
            scrollToGrid();
          }
        });
        container.append(nextLi);
      }

      function scrollToGrid() {
        $('html, body').animate({
          scrollTop: $('#category-filter-buttons').offset().top - 100
        }, 'fast');
      }

      function checkEmptyState() {
        const visibleCount = filteredCards.length;
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
        currentPage = 1;
        updatePagination();
      });

      // Search box listener
      $('#search-btn').on('click', function() {
        currentPage = 1;
        updatePagination();
      });
      $('#search-input').on('keyup', function() {
        currentPage = 1;
        updatePagination();
      });
    });
  </script>
</body>
</html>