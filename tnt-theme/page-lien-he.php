<?php
/**
 * Trang Thông tin liên hệ (slug: lien-he)
 */
get_header();
$tnt  = tnt_company();
$sent = isset( $_GET['sent'] ) ? sanitize_text_field( wp_unslash( $_GET['sent'] ) ) : '';
$sp   = isset( $_GET['sp'] ) ? sanitize_text_field( wp_unslash( $_GET['sp'] ) ) : '';
get_template_part( 'template-parts/page-hero', null, array(
    'title' => 'Thông tin liên hệ',
    'lead'  => 'Liên hệ TNT để được tư vấn chủng loại, quy cách và báo giá vật tư.',
    'image' => 'hero-engineer.jpg',
) );

$map_url = function ( $address ) {
    return 'https://www.google.com/maps?q=' . rawurlencode( $address ) . '&output=embed';
};
?>

<main id="main">

    <section class="tnt-section pb-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="tnt-contact-card">
                        <div class="tnt-contact-card__icon"><?php echo tnt_icon( 'phone' ); ?></div>
                        <h3>Hotline</h3>
                        <?php foreach ( $tnt['phones'] as $p ) : ?>
                            <a class="tnt-contact-card__big" href="<?php echo esc_url( tnt_tel( $p ) ); ?>"><?php echo esc_html( $p ); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tnt-contact-card">
                        <div class="tnt-contact-card__icon"><?php echo tnt_icon( 'mail' ); ?></div>
                        <h3>Email</h3>
                        <a class="tnt-contact-card__big" href="mailto:<?php echo esc_attr( $tnt['email'] ); ?>"><?php echo esc_html( $tnt['email'] ); ?></a>
                        <p class="mb-0">Gửi danh mục vật tư cần báo giá.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tnt-contact-card">
                        <div class="tnt-contact-card__icon"><?php echo tnt_icon( 'doc' ); ?></div>
                        <h3>Thông tin doanh nghiệp</h3>
                        <p class="mb-1"><strong><?php echo esc_html( $tnt['name'] ); ?></strong></p>
                        <p class="mb-0">MST: <?php echo esc_html( $tnt['tax_code'] ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tnt-section">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-5" id="bao-gia">
                    <span class="tnt-eyebrow">Yêu cầu báo giá</span>
                    <h2 class="tnt-heading">Gửi yêu cầu cho chúng tôi</h2>

                    <?php if ( '1' === $sent ) : ?>
                        <div class="alert alert-success">Cảm ơn quý khách! TNT đã nhận yêu cầu và sẽ liên hệ lại sớm.</div>
                    <?php elseif ( '0' === $sent ) : ?>
                        <div class="alert alert-danger">Chưa gửi được yêu cầu. Vui lòng kiểm tra họ tên, số điện thoại hoặc gọi trực tiếp <?php echo esc_html( $tnt['phones'][0] ); ?>.</div>
                    <?php endif; ?>

                    <form class="tnt-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                        <input type="hidden" name="action" value="tnt_contact">
                        <?php wp_nonce_field( 'tnt_contact', 'tnt_contact_nonce' ); ?>
                        <div class="tnt-hp" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="tnt-name">Họ tên *</label>
                                <input class="form-control" id="tnt-name" name="name" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="tnt-phone">Số điện thoại *</label>
                                <input class="form-control" id="tnt-phone" name="phone" type="tel" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="tnt-email">Email</label>
                                <input class="form-control" id="tnt-email" name="email" type="email">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="tnt-product">Sản phẩm quan tâm</label>
                                <input class="form-control" id="tnt-product" name="product" list="tnt-products" value="<?php echo esc_attr( $sp ); ?>" placeholder="VD: Thép hộp 40x80, mặt bích JIS 10K…">
                                <datalist id="tnt-products">
                                    <?php foreach ( tnt_product_groups() as $g ) : foreach ( $g['items'] as $it ) : ?>
                                        <option value="<?php echo esc_attr( $it['name'] ); ?>">
                                    <?php endforeach; endforeach; ?>
                                </datalist>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="tnt-message">Nội dung</label>
                                <textarea class="form-control" id="tnt-message" name="message" rows="5" placeholder="Quy cách, số lượng, thời gian và địa điểm giao hàng…"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn tnt-btn tnt-btn--primary btn-lg w-100" type="submit">Gửi yêu cầu báo giá</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7">
                    <span class="tnt-eyebrow">Địa chỉ</span>
                    <h2 class="tnt-heading">Trụ sở & kho hàng</h2>
                    <div class="tnt-locations" role="tablist">
                        <?php foreach ( $tnt['locations'] as $i => $loc ) : ?>
                            <button type="button" class="tnt-location<?php echo 0 === $i ? ' is-active' : ''; ?>" data-map="<?php echo esc_url( $map_url( $loc['address'] ) ); ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>">
                                <?php echo tnt_icon( 'pin' ); ?>
                                <span><strong><?php echo esc_html( $loc['label'] ); ?></strong><?php echo esc_html( $loc['address'] ); ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <div class="tnt-map">
                        <iframe id="tntMap" src="<?php echo esc_url( $map_url( $tnt['locations'][0]['address'] ) ); ?>" title="Bản đồ TNT" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
