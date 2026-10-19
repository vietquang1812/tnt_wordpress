/* TNT theme scripts */
(function () {
  'use strict';

  // Header đổ bóng khi cuộn
  var header = document.querySelector('.tnt-header');
  if (header) {
    var onScroll = function () { header.classList.toggle('is-scrolled', window.scrollY > 10); };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // Xem ảnh phóng to
  var modalEl = document.getElementById('tntZoom');
  if (modalEl && window.bootstrap) {
    var modal = new bootstrap.Modal(modalEl);
    var img = document.getElementById('tntZoomImg');
    document.addEventListener('click', function (e) {
      var btn = e.target.closest('[data-tnt-zoom]');
      if (!btn) return;
      img.src = btn.getAttribute('data-tnt-zoom');
      var inner = btn.querySelector('img');
      img.alt = inner ? inner.alt : '';
      modal.show();
    });
  }

  // Đổi bản đồ theo địa điểm
  var map = document.getElementById('tntMap');
  document.querySelectorAll('.tnt-location').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('.tnt-location').forEach(function (b) {
        b.classList.remove('is-active');
        b.setAttribute('aria-selected', 'false');
      });
      btn.classList.add('is-active');
      btn.setAttribute('aria-selected', 'true');
      if (map) map.src = btn.getAttribute('data-map');
    });
  });

  // Đánh dấu mục đang xem trên thanh danh mục sản phẩm
  var links = document.querySelectorAll('.tnt-catnav a');
  if (links.length && 'IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        links.forEach(function (a) {
          a.classList.toggle('is-active', a.getAttribute('href') === '#' + en.target.id);
        });
      });
    }, { rootMargin: '-45% 0px -50% 0px' });
    document.querySelectorAll('.tnt-pgroup').forEach(function (s) { io.observe(s); });
  }
})();
