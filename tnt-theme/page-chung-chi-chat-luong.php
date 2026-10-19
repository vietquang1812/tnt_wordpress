<?php
/**
 * Trang Chứng chỉ chất lượng (slug: chung-chi-chat-luong)
 */
get_header();
$tnt = tnt_company();
get_template_part( 'template-parts/page-hero', null, array(
    'title' => 'Chứng chỉ chất lượng',
    'lead'  => 'Hồ sơ pháp lý và các tiêu chuẩn kỹ thuật sản phẩm TNT tuân thủ.',
    'image' => 'bg-road.jpg',
) );

$certs = array(
    array(
        'title' => 'Giấy chứng nhận đăng ký doanh nghiệp',
        'image' => 'cert-dang-ky-doanh-nghiep.jpg',
        'rows'  => array(
            'Mã số doanh nghiệp' => $tnt['tax_code'],
            'Đăng ký lần đầu'    => $tnt['founded'],
            'Vốn điều lệ'        => $tnt['capital'],
            'Nơi cấp'            => 'Phòng Đăng ký kinh doanh – Sở KH&ĐT TP. Đà Nẵng',
        ),
    ),
    array(
        'title' => 'Giấy chứng nhận đăng ký địa điểm kinh doanh',
        'image' => 'cert-dia-diem-kinh-doanh.jpg',
        'rows'  => array(
            'Tên địa điểm'       => 'Kho hàng thép – Công ty CP Vật tư Xây dựng TNT',
            'Mã số địa điểm'     => '00001',
            'Đăng ký lần đầu'    => '06/06/2022',
            'Địa chỉ'            => $tnt['locations'][1]['address'],
        ),
    ),
);

$standards = array(
    array( 'ANSI / ASME', 'Tiêu chuẩn Mỹ cho mặt bích, phụ kiện và đường ống áp lực.' ),
    array( 'DIN', 'Tiêu chuẩn công nghiệp Đức cho mặt bích và phụ kiện.' ),
    array( 'JIS', 'Tiêu chuẩn công nghiệp Nhật Bản — mặt bích JIS 5K, 10K…' ),
    array( 'PN10 · PN16', 'Cấp áp lực danh định cho mặt bích, van công nghiệp.' ),
    array( 'SCH 10 · 40 · 80', 'Độ dày thành ống và phụ kiện co, tê, côn theo schedule.' ),
    array( 'ASTM', 'Tiêu chuẩn vật liệu thép carbon, thép không gỉ.' ),
);
?>

<main id="main">

    <section class="tnt-section">
        <div class="container">
            <div class="tnt-section__head">
                <span class="tnt-eyebrow">Cơ sở pháp lý</span>
                <h2 class="tnt-heading">Hồ sơ pháp lý doanh nghiệp</h2>
                <p>TNT hoạt động hợp pháp theo giấy phép do Sở Kế hoạch và Đầu tư TP. Đà Nẵng cấp. Bấm vào ảnh để xem bản đầy đủ.</p>
            </div>
            <div class="row g-4">
                <?php foreach ( $certs as $c ) : ?>
                    <div class="col-lg-6">
                        <article class="tnt-cert">
                            <button type="button" class="tnt-cert__img" data-tnt-zoom="<?php echo esc_url( tnt_img( $c['image'] ) ); ?>" aria-label="Phóng to <?php echo esc_attr( $c['title'] ); ?>">
                                <img src="<?php echo esc_url( tnt_img( $c['image'] ) ); ?>" alt="<?php echo esc_attr( $c['title'] ); ?>" loading="lazy">
                                <span><?php echo tnt_icon( 'zoom' ); ?></span>
                            </button>
                            <div class="tnt-cert__body">
                                <div class="tnt-cert__tag"><?php echo tnt_icon( 'doc' ); ?> Giấy phép</div>
                                <h3><?php echo esc_html( $c['title'] ); ?></h3>
                                <dl>
                                    <?php foreach ( $c['rows'] as $k => $v ) : ?>
                                        <dt><?php echo esc_html( $k ); ?></dt><dd><?php echo esc_html( $v ); ?></dd>
                                    <?php endforeach; ?>
                                </dl>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tnt-section tnt-section--tint">
        <div class="container">
            <div class="tnt-section__head">
                <span class="tnt-eyebrow">Tiêu chuẩn kỹ thuật</span>
                <h2 class="tnt-heading">Sản phẩm tuân thủ tiêu chuẩn quốc tế</h2>
                <p>Mặt bích, phụ kiện và van do TNT cung cấp được chế tạo từ thép carbon, thép không gỉ và gang chất lượng cao, tuân thủ các tiêu chuẩn sau:</p>
            </div>
            <div class="row g-3">
                <?php foreach ( $standards as $s ) : ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="tnt-standard">
                            <strong><?php echo esc_html( $s[0] ); ?></strong>
                            <p><?php echo esc_html( $s[1] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tnt-section">
        <div class="container">
            <div class="tnt-coq">
                <div class="tnt-coq__icon"><?php echo tnt_icon( 'shield' ); ?></div>
                <div>
                    <h2>Chứng chỉ xuất xưởng CO / CQ</h2>
                    <p class="mb-0">Chứng nhận xuất xứ (CO) và chứng nhận chất lượng (CQ) của nhà sản xuất được cung cấp kèm theo lô hàng khi khách hàng yêu cầu. Vui lòng liên hệ để nhận bản sao chứng chỉ cho từng sản phẩm.</p>
                </div>
                <a class="btn tnt-btn tnt-btn--primary" href="<?php echo esc_url( tnt_page_url( 'lien-he' ) . '#bao-gia' ); ?>">Liên hệ</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
