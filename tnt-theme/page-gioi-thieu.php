<?php
/**
 * Trang Giới thiệu (slug: gioi-thieu)
 */
get_header();
$tnt = tnt_company();

/**
 * Các mốc "Lịch sử phát triển". Chỉ ghi các mốc đã có trong giấy tờ/hồ sơ của công ty.
 * Muốn thêm mốc: thêm một dòng array( 'year' => '...', 'text' => '...' ) theo thứ tự thời gian
 * (trong 'text' chỉ cho phép thẻ <strong>).
 */
$history = array(
    array( 'year' => '2020', 'text' => 'Ngày <strong>01/04/2020</strong>, <strong>Công ty Cổ phần Vật tư Xây dựng TNT</strong> chính thức được thành lập tại Đà Nẵng, chuyên cung cấp thép và vật tư công nghiệp.' ),
    array( 'year' => '2022', 'text' => 'Ngày <strong>06/06/2022</strong>, đăng ký <strong>địa điểm kinh doanh Kho hàng thép</strong> tại 617 Nguyễn Lương Bằng, Liên Chiểu, Đà Nẵng.' ),
    array( 'year' => '2026', 'text' => 'Ngày <strong>04/02/2026</strong>, thành lập <strong>kho số 2</strong> tại 111 Trần Đại Nghĩa, Ngũ Hành Sơn, Đà Nẵng (kho &amp; showroom).' ),
    array( 'year' => 'Hiện nay', 'text' => 'Vận hành <strong>2 kho tại Đà Nẵng</strong> — Liên Chiểu và Ngũ Hành Sơn (kho &amp; showroom), hàng luôn sẵn, giao tận công trình.' ),
);
get_template_part( 'template-parts/page-hero', null, array(
    'title' => 'Giới thiệu',
    'lead'  => 'Công ty Cổ phần Vật tư Xây dựng TNT — thép và vật tư công nghiệp cho miền Trung.',
    'image' => 'hero-city.jpg',
) );
?>

<main id="main">

    <!-- VỀ TNT -->
    <section class="tnt-section">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-lg-5">
                    <div class="tnt-about__media">
                        <img src="<?php echo esc_url( tnt_img( 'about-worker.jpg' ) ); ?>" alt="Kỹ sư công trình" class="img-fluid" loading="lazy">
                    </div>
                </div>
                <div class="col-lg-7">
                    <span class="tnt-eyebrow">Về TNT</span>
                    <h2 class="tnt-heading">Đối tác cung ứng vật tư xây dựng đáng tin cậy</h2>
                    <p><?php echo esc_html( $tnt['name'] ); ?> là đơn vị chuyên kinh doanh vật tư xây dựng, tập trung vào thép xây dựng, thép ống, thép hộp và thép hình U, I, V, H. Ngoài ra, TNT cung cấp thép tấm, phụ kiện PCCC, phụ kiện ngành hơi nước và các loại van công nghiệp.</p>
                    <p>Với đội ngũ am hiểu sản phẩm, TNT cam kết mang đến sản phẩm đạt tiêu chuẩn kỹ thuật, giao hàng đúng tiến độ và hàng luôn sẵn sàng.</p>
                    <ul class="tnt-checklist">
                        <li><?php echo tnt_icon( 'check' ); ?> Sản phẩm đạt tiêu chuẩn kỹ thuật</li>
                        <li><?php echo tnt_icon( 'check' ); ?> Giao hàng đúng hẹn, đúng tiến độ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- LỊCH SỬ PHÁT TRIỂN -->
    <section class="tnt-hist" id="lich-su">
        <div class="container">
            <h2 class="tnt-hist__title"><span>Lịch sử phát triển</span></h2>

            <div class="tnt-hist__panel">
                <div class="tnt-hist__quote">
                    <img class="tnt-hist__logo" src="<?php echo esc_url( tnt_img( 'logo-tnt-white.png' ) ); ?>" alt="TNT" width="96" height="83" loading="lazy">
                    <div>
                        <p class="tnt-hist__lead">Từ năm 2020 đến nay, chúng tôi luôn nhận thức rằng:</p>
                        <blockquote>“Thép chuẩn – giao đúng hẹn. Khách hàng là trên hết.”</blockquote>
                    </div>
                </div>

                <ol class="tnt-tl" style="--tl-n:<?php echo (int) count( $history ); ?>">
                    <?php foreach ( $history as $i => $m ) :
                        $up = ( 0 === $i % 2 );
                        $block = '<div class="tnt-tl__text">' . wp_kses( $m['text'], array( 'strong' => array() ) ) . '</div>';
                        $stem  = '<span class="tnt-tl__stem" aria-hidden="true"></span>';
                    ?>
                        <li class="tnt-tl__item <?php echo $up ? 'is-up' : 'is-down'; ?>">
                            <div class="tnt-tl__top"><?php echo $up ? $block . $stem : ''; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
                            <div class="tnt-tl__year"><span><?php echo esc_html( $m['year'] ); ?></span></div>
                            <div class="tnt-tl__bottom"><?php echo $up ? '' : $stem . $block; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
</main>

<?php get_footer(); ?>
