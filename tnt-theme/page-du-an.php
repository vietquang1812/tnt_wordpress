<?php
/**
 * Trang Dự Án (slug: du-an) — danh sách theo hàng: chữ bên trái, ảnh bên phải.
 * Dữ liệu lấy từ admin: Dự án.
 */
get_header();
$projects = tnt_get_projects();

get_template_part( 'template-parts/page-hero', null, array(
    'title' => 'Dự Án',
    'lead'  => 'Các dự án TNT đã cung cấp vật tư thép.',
    'image' => 'hero-city.jpg',
) );
?>

<main id="main">
    <section class="tnt-section">
        <div class="container">
            <?php if ( ! $projects ) : ?>
                <p class="text-center text-muted py-5 mb-0">Danh sách dự án đang được cập nhật.</p>
            <?php else : ?>
                <div class="tnt-pjl">
                    <?php foreach ( $projects as $i => $p ) :
                        $imgs = $p['images'];
                        $n    = count( $imgs );
                        $subs = array_slice( $imgs, 1, 4 );
                        ?>
                        <article class="tnt-pjl__row">
                            <div class="tnt-pjl__text">
                                <h2 class="tnt-pjl__title"><?php echo esc_html( $p['title'] ); ?></h2>
                                <?php if ( $p['detail'] ) : ?>
                                    <div class="tnt-pjl__detail" data-pj-detail><?php echo $p['detail']; // đã qua the_content ?></div>
                                    <button type="button" class="tnt-pjl__more" data-pj-more hidden aria-expanded="false">Xem chi tiết</button>
                                <?php endif; ?>
                            </div>
                            <div class="tnt-pjl__media">
                                <?php if ( $n ) : ?>
                                    <button type="button" class="tnt-pjl__main" data-pj-open="<?php echo (int) $i; ?>" data-pj-at="0" aria-label="Xem ảnh: <?php echo esc_attr( $p['title'] ); ?>">
                                        <img src="<?php echo esc_url( $imgs[0]['thumb'] ); ?>" alt="<?php echo esc_attr( $imgs[0]['alt'] ); ?>" loading="lazy">
                                    </button>
                                    <?php if ( $subs ) : ?>
                                        <div class="tnt-pjl__subs">
                                            <?php foreach ( $subs as $k => $im ) :
                                                $is_last = ( 3 === $k && $n > 5 );
                                                ?>
                                                <button type="button" class="tnt-pjl__sm" data-pj-open="<?php echo (int) $i; ?>" data-pj-at="<?php echo (int) ( $k + 1 ); ?>" aria-label="Xem ảnh <?php echo (int) ( $k + 2 ); ?>">
                                                    <img src="<?php echo esc_url( $im['thumb'] ); ?>" alt="<?php echo esc_attr( $im['alt'] ); ?>" loading="lazy">
                                                    <?php if ( $is_last ) : ?><span class="tnt-pjl__more-img">+<?php echo (int) ( $n - 4 ); ?></span><?php endif; ?>
                                                </button>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <div class="tnt-pjl__noimg"><img src="<?php echo esc_url( tnt_img( 'logo-tnt.png' ) ); ?>" alt=""></div>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
</main>

<?php if ( $projects ) : ?>
<div class="tnt-pj" id="tnt-pj" hidden role="dialog" aria-modal="true" aria-label="Xem ảnh dự án">
    <div class="tnt-pj__backdrop" data-pj-close></div>
    <figure class="tnt-pj__box">
        <button type="button" class="tnt-lb__btn tnt-lb__close" data-pj-close aria-label="Đóng">&times;</button>
        <div class="tnt-pj__stage">
            <button type="button" class="tnt-lb__btn tnt-lb__prev" data-pj-prev aria-label="Ảnh trước">&#8249;</button>
            <img class="tnt-pj__img" src="" alt="">
            <button type="button" class="tnt-lb__btn tnt-lb__next" data-pj-next aria-label="Ảnh sau">&#8250;</button>
        </div>
        <figcaption class="tnt-pj__cap"><strong></strong><em></em></figcaption>
    </figure>
</div>
<script type="application/json" id="tnt-pj-data"><?php echo wp_json_encode( $projects, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE ); ?></script>
<script>
(function () {
    /* Rút gọn nội dung dài (khoảng 5 dòng) + nút Xem chi tiết / Thu gọn */
    function setupClamp() {
        Array.prototype.forEach.call(document.querySelectorAll('[data-pj-detail]'), function (d) {
            var btn = d.parentNode.querySelector('[data-pj-more]');
            d.classList.add('is-clamped');
            if (d.scrollHeight > d.clientHeight + 2) {
                btn.hidden = false;
                btn.onclick = function () {
                    var open = d.classList.toggle('is-clamped') === false;
                    btn.textContent = open ? 'Thu gọn' : 'Xem chi tiết';
                    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
                };
            } else {
                d.classList.remove('is-clamped');
            }
        });
    }
    setupClamp();
    window.addEventListener('load', setupClamp);

    /* Xem ảnh phóng to */
    var box = document.getElementById('tnt-pj');
    var data = JSON.parse(document.getElementById('tnt-pj-data').textContent);
    var img = box.querySelector('.tnt-pj__img');
    var cap = box.querySelector('.tnt-pj__cap');
    var cur = null, idx = 0, opener = null;

    function show(i) {
        var imgs = cur.images;
        idx = (i + imgs.length) % imgs.length;
        img.src = imgs[idx].full;
        img.alt = imgs[idx].alt;
        cap.querySelector('strong').textContent = cur.title;
        cap.querySelector('em').textContent = imgs.length > 1 ? (idx + 1) + ' / ' + imgs.length : '';
        box.classList.toggle('is-single', imgs.length < 2);
    }
    function open(n, at, trigger) {
        cur = data[n]; opener = trigger;
        show(at);
        box.hidden = false;
        document.documentElement.classList.add('tnt-lb-open');
        box.querySelector('.tnt-lb__close').focus();
    }
    function close() {
        box.hidden = true;
        img.removeAttribute('src');
        document.documentElement.classList.remove('tnt-lb-open');
        if (opener) { opener.focus(); }
    }
    document.addEventListener('click', function (e) {
        var c = e.target.closest('[data-pj-open]');
        if (c) { open(parseInt(c.getAttribute('data-pj-open'), 10), parseInt(c.getAttribute('data-pj-at'), 10) || 0, c); return; }
        if (box.hidden) { return; }
        if (e.target.closest('[data-pj-close]')) { close(); }
        else if (e.target.closest('[data-pj-prev]')) { show(idx - 1); }
        else if (e.target.closest('[data-pj-next]')) { show(idx + 1); }
    });
    document.addEventListener('keydown', function (e) {
        if (box.hidden) { return; }
        if (e.key === 'Escape') { close(); }
        else if (e.key === 'ArrowLeft') { show(idx - 1); }
        else if (e.key === 'ArrowRight') { show(idx + 1); }
    });
})();
</script>
<?php endif; ?>

<?php get_footer(); ?>
