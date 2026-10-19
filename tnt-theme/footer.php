<?php $tnt = tnt_company(); ?>
<footer class="tnt-footer">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-4">
                <a class="tnt-brand tnt-brand--light mb-3" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <span class="tnt-brand__mark"><img src="<?php echo esc_url( tnt_img( 'logo-tnt.png' ) ); ?>" alt="Logo TNT" width="78" height="52"></span>
                    <span class="tnt-brand__text"><small>Công ty Cổ phần</small><strong>Vật tư Xây dựng <em>TNT</em></strong></span>
                </a>
                <p>Chuyên cung cấp sắt xây dựng, thép ống, thép hộp, thép hình U – I – V – H, thép tấm, co tê, mặt bích và van công nghiệp tại Đà Nẵng và khu vực miền Trung.</p>
                <p class="mb-0 small">MST: <?php echo esc_html( $tnt['tax_code'] ); ?></p>
            </div>
            <div class="col-6 col-lg-2">
                <h3 class="tnt-footer__title">Liên kết</h3>
                <ul class="list-unstyled">
                    <?php foreach ( tnt_main_pages() as $slug => $title ) : ?>
                        <li><a href="<?php echo esc_url( tnt_page_url( $slug ) ); ?>"><?php echo esc_html( $title ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-6 col-lg-2">
                <h3 class="tnt-footer__title">Sản phẩm</h3>
                <ul class="list-unstyled">
                    <?php foreach ( array_slice( tnt_product_groups(), 0, 6 ) as $g ) : ?>
                        <li><a href="<?php echo esc_url( tnt_page_url( 'san-pham' ) . '#' . $g['id'] ); ?>"><?php echo esc_html( $g['title'] ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-4">
                <h3 class="tnt-footer__title">Liên hệ</h3>
                <ul class="list-unstyled tnt-footer__contact">
                    <li><?php echo tnt_icon( 'phone' ); ?>
                        <span><?php foreach ( $tnt['phones'] as $i => $p ) : ?><a href="<?php echo esc_url( tnt_tel( $p ) ); ?>"><?php echo esc_html( $p ); ?></a><?php echo $i < count( $tnt['phones'] ) - 1 ? ' – ' : ''; ?><?php endforeach; ?></span></li>
                    <li><?php echo tnt_icon( 'mail' ); ?><a href="mailto:<?php echo esc_attr( $tnt['email'] ); ?>"><?php echo esc_html( $tnt['email'] ); ?></a></li>
                    <?php foreach ( $tnt['locations'] as $loc ) : ?>
                        <li><?php echo tnt_icon( 'pin' ); ?><span><strong><?php echo esc_html( $loc['label'] ); ?>:</strong> <?php echo esc_html( $loc['address'] ); ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="tnt-footer__bottom">
        <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
            <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( $tnt['name'] ); ?>.</span>
            <span>Thép – Vật tư – Phụ kiện công nghiệp</span>
        </div>
    </div>
</footer>

<!-- Hộp xem ảnh phóng to (dùng cho ảnh có data-tnt-zoom) -->
<div class="modal fade" id="tntZoom" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="btn-close btn-close-white ms-auto mb-2" data-bs-dismiss="modal" aria-label="Đóng"></button>
            <img src="" alt="" class="img-fluid rounded" id="tntZoomImg">
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
