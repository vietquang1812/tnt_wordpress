<?php
/**
 * Trang chủ
 */
get_header();
$tnt    = tnt_company();
$groups = tnt_product_groups();
?>

<main id="main">

    <!-- HERO -->
    <section class="tnt-hero" style="--hero-img:url('<?php echo esc_url( tnt_img( 'hero-city.jpg' ) ); ?>')">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8 col-xl-7">
                    <span class="tnt-eyebrow tnt-eyebrow--light">Thép & vật tư công nghiệp tại Đà Nẵng</span>
                    <h1 class="tnt-hero__title">Vật tư thép chất lượng cho <span>mọi công trình</span></h1>
                    <p class="tnt-hero__lead">TNT cung cấp sắt xây dựng, thép ống, thép hộp, thép hình U – I – V – H, thép tấm, co tê, mặt bích và van công nghiệp — đạt chuẩn kỹ thuật, giao hàng đúng tiến độ.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a class="btn tnt-btn tnt-btn--accent btn-lg" href="<?php echo esc_url( tnt_page_url( 'san-pham' ) ); ?>">Xem sản phẩm <?php echo tnt_icon( 'arrow' ); ?></a>
                        <a class="btn tnt-btn tnt-btn--ghost btn-lg" href="<?php echo esc_url( tnt_page_url( 'lien-he' ) . '#bao-gia' ); ?>">Nhận báo giá</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tnt-hero__slash" aria-hidden="true"></div>
    </section>

    <!-- SỐ LIỆU -->
    <section class="tnt-stats">
        <div class="container">
            <div class="tnt-stats__grid">
                <div><strong>2020</strong><span>Thành lập tại Đà Nẵng</span></div>
                <div><strong>02</strong><span>Kho hàng thép</span></div>
                <div><strong>8+</strong><span>Nhóm sản phẩm</span></div>
                <div><strong>4</strong><span>Lĩnh vực công trình</span></div>
            </div>
        </div>
    </section>

    <!-- GIỚI THIỆU -->
    <section class="tnt-section">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-lg-5">
                    <div class="tnt-about__media">
                        <img src="<?php echo esc_url( tnt_img( 'about-worker.jpg' ) ); ?>" alt="Kỹ sư công trình" class="img-fluid" loading="lazy">
                    </div>
                </div>
                <div class="col-lg-7">
                    <span class="tnt-eyebrow">Giới thiệu</span>
                    <h2 class="tnt-heading">Đối tác cung ứng vật tư xây dựng đáng tin cậy</h2>
                    <p>Công ty Cổ phần Vật tư Xây dựng TNT là đơn vị chuyên kinh doanh vật tư xây dựng, tập trung đặc biệt vào các sản phẩm thép xây dựng, thép ống, thép hộp và các loại thép hình U, I, V, H. Ngoài ra, chúng tôi cũng cung cấp thép tấm, phụ kiện phòng cháy, phụ kiện ngành hơi nước và các loại van công nghiệp.</p>
                    <p>Với đội ngũ nhân viên chuyên nghiệp, am hiểu sâu về sản phẩm, TNT cam kết mang đến những sản phẩm thép chất lượng cao, đáp ứng tiêu chuẩn kỹ thuật và yêu cầu của ngành xây dựng.</p>
                    <ul class="tnt-checklist">
                        <li><?php echo tnt_icon( 'check' ); ?> Sản phẩm đạt tiêu chuẩn kỹ thuật</li>
                        <li><?php echo tnt_icon( 'check' ); ?> Giao hàng đúng hẹn, đúng tiến độ</li>
                        <li><?php echo tnt_icon( 'check' ); ?> Tư vấn tận tâm, báo giá nhanh</li>
                        <li><?php echo tnt_icon( 'check' ); ?> Kho hàng sẵn tại Đà Nẵng</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- TẦM NHÌN – SỨ MỆNH – GIÁ TRỊ -->
    <section class="tnt-section tnt-section--tint">
        <div class="container">
            <div class="text-center mx-auto tnt-section__head">
                <span class="tnt-eyebrow">Định hướng phát triển</span>
                <h2 class="tnt-heading">Tầm nhìn, sứ mệnh, giá trị cốt lõi</h2>
                <p>Chúng tôi luôn đặt chất lượng lên hàng đầu — tìm kiếm và cung cấp những sản phẩm chất lượng cao, bền vững và đáp ứng các tiêu chuẩn kỹ thuật.</p>
            </div>
            <div class="row g-4">
                <?php
                $values = array(
                    array( 'eye', 'Tầm nhìn', 'Trở thành đơn vị hàng đầu trong ngành cung cấp vật tư xây dựng, đáp ứng mọi nhu cầu của khách hàng; hướng đến tương lai bền vững và đóng góp tích cực vào sự phát triển của ngành xây dựng.' ),
                    array( 'target', 'Sứ mệnh', 'Cung cấp sản phẩm và dịch vụ vật tư xây dựng chất lượng cao, đáp ứng đầy đủ tiêu chuẩn kỹ thuật; mang lại sự hài lòng và tin tưởng tuyệt đối qua chất lượng, sự đúng hẹn và dịch vụ tận tâm.' ),
                    array( 'heart', 'Giá trị cốt lõi', 'Xây dựng quan hệ lâu dài với khách hàng và đối tác bằng sự tôn trọng, thẳng thắn và trung thực trong mọi giao dịch. Khách hàng và đối tác là một phần quan trọng trong sự phát triển của TNT.' ),
                );
                foreach ( $values as $v ) :
                    ?>
                    <div class="col-md-4">
                        <div class="tnt-value">
                            <div class="tnt-value__icon"><?php echo tnt_icon( $v[0] ); ?></div>
                            <h3><?php echo esc_html( $v[1] ); ?></h3>
                            <p><?php echo esc_html( $v[2] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- SẢN PHẨM -->
    <section class="tnt-section">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-5">
                <div>
                    <span class="tnt-eyebrow">Sản phẩm</span>
                    <h2 class="tnt-heading mb-0">Danh mục sản phẩm chủ lực</h2>
                </div>
                <a class="tnt-link" href="<?php echo esc_url( tnt_page_url( 'san-pham' ) ); ?>">Xem tất cả sản phẩm <?php echo tnt_icon( 'arrow' ); ?></a>
            </div>
            <div class="row g-4">
                <?php foreach ( $groups as $g ) : ?>
                    <div class="col-6 col-lg-3">
                        <a class="tnt-cat" href="<?php echo esc_url( tnt_page_url( 'san-pham' ) . '#' . $g['id'] ); ?>">
                            <div class="tnt-cat__img"><img src="<?php echo esc_url( tnt_img( $g['items'][0]['images'][0] ) ); ?>" alt="<?php echo esc_attr( $g['title'] ); ?>" loading="lazy"></div>
                            <div class="tnt-cat__body">
                                <h3><?php echo esc_html( $g['title'] ); ?></h3>
                                <span><?php echo tnt_icon( 'arrow' ); ?></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- LĨNH VỰC CÔNG TRÌNH -->
    <section class="tnt-section tnt-section--dark">
        <div class="container">
            <div class="text-center mx-auto tnt-section__head">
                <span class="tnt-eyebrow tnt-eyebrow--light">Dự án tiêu biểu</span>
                <h2 class="tnt-heading">Vật tư cho mọi lĩnh vực công trình</h2>
            </div>
            <div class="row g-4">
                <?php foreach ( tnt_project_fields() as $p ) : ?>
                    <div class="col-sm-6 col-lg-3">
                        <figure class="tnt-field">
                            <img src="<?php echo esc_url( tnt_img( $p['image'] ) ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" loading="lazy">
                            <figcaption>
                                <h3><?php echo esc_html( $p['title'] ); ?></h3>
                                <p><?php echo esc_html( $p['desc'] ); ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- PHƯƠNG CHÂM -->
    <section class="tnt-section">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5">
                    <span class="tnt-eyebrow">Phương châm hoạt động</span>
                    <h2 class="tnt-heading">Khách hàng là trên hết</h2>
                    <p>Các dự án xây dựng đòi hỏi sự chính xác và đúng hẹn. Vì vậy TNT luôn đảm bảo chất lượng sản phẩm, sự đáng tin cậy trong giao hàng và cam kết đáp ứng đúng tiến độ.</p>
                </div>
                <div class="col-lg-7">
                    <div class="row g-3">
                        <?php
                        $pillars = array(
                            array( 'shield', 'Chất lượng', 'Hàng đạt chuẩn kỹ thuật, nguồn gốc rõ ràng.' ),
                            array( 'clock', 'Đúng tiến độ', 'Giao hàng đúng hẹn theo kế hoạch công trình.' ),
                            array( 'truck', 'Kho sẵn hàng', 'Hai kho tại Liên Chiểu và Ngũ Hành Sơn.' ),
                            array( 'users', 'Tận tâm', 'Tư vấn chủng loại, quy cách phù hợp.' ),
                        );
                        foreach ( $pillars as $p ) :
                            ?>
                            <div class="col-sm-6">
                                <div class="tnt-pillar">
                                    <?php echo tnt_icon( $p[0] ); ?>
                                    <div><h3><?php echo esc_html( $p[1] ); ?></h3><p><?php echo esc_html( $p[2] ); ?></p></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>

</main>

<?php get_footer(); ?>
