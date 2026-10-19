<?php $tnt = tnt_company(); ?>
<section class="tnt-cta">
    <div class="container">
        <div class="tnt-cta__box">
            <div>
                <h2>Cần báo giá thép và phụ kiện?</h2>
                <p>Gửi danh mục vật tư, TNT sẽ tư vấn và báo giá nhanh nhất.</p>
            </div>
            <div class="d-flex flex-wrap gap-3">
                <a class="btn tnt-btn tnt-btn--accent btn-lg" href="<?php echo esc_url( tnt_tel( $tnt['phones'][0] ) ); ?>"><?php echo tnt_icon( 'phone' ); ?> <?php echo esc_html( $tnt['phones'][0] ); ?></a>
                <a class="btn tnt-btn tnt-btn--ghost btn-lg" href="<?php echo esc_url( tnt_page_url( 'lien-he' ) . '#bao-gia' ); ?>">Gửi yêu cầu</a>
            </div>
        </div>
    </div>
</section>
