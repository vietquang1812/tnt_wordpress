<?php
/**
 * Trang Sản phẩm (slug: san-pham)
 */
get_header();
$groups = tnt_product_groups();
get_template_part( 'template-parts/page-hero', null, array(
    'title' => 'Sản phẩm',
    'lead'  => 'Sắt xây dựng, thép ống – hộp, thép hình, thép tấm, co tê, mặt bích và van công nghiệp.',
    'image' => 'hero-city.jpg',
) );
?>

<main id="main">
    <div class="tnt-catnav">
        <div class="container">
            <ul>
                <?php foreach ( $groups as $g ) : ?>
                    <li><a href="#<?php echo esc_attr( $g['id'] ); ?>"><?php echo esc_html( $g['title'] ); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <?php foreach ( $groups as $i => $g ) : ?>
        <section class="tnt-section tnt-pgroup<?php echo $i % 2 ? ' tnt-section--tint' : ''; ?>" id="<?php echo esc_attr( $g['id'] ); ?>">
            <div class="container">
                <div class="tnt-pgroup__head">
                    <span class="tnt-pgroup__num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
                    <div>
                        <h2 class="tnt-heading mb-2"><?php echo esc_html( $g['title'] ); ?></h2>
                        <p class="mb-0"><?php echo esc_html( $g['intro'] ); ?></p>
                    </div>
                </div>

                <div class="row g-4">
                    <?php if ( ! empty( $g['types'] ) ) : ?>
                        <div class="col-lg-5 order-lg-2">
                            <div class="tnt-types">
                                <h3>Chủng loại mặt bích</h3>
                                <ul>
                                    <?php foreach ( $g['types'] as $t ) : ?><li><?php echo esc_html( $t ); ?></li><?php endforeach; ?>
                                </ul>
                                <p class="small mb-0">Tiêu chuẩn: <strong>ANSI · ASME · DIN · JIS · PN10 · PN16</strong></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php
                    $count = count( $g['items'] );
                    $col   = ! empty( $g['types'] ) ? 'col-lg-7' : ( 1 === $count ? 'col-12' : ( 3 === $count ? 'col-md-6 col-lg-4' : 'col-md-6' ) );
                    foreach ( $g['items'] as $item ) :
                        $imgs = $item['images'];
                        ?>
                        <div class="<?php echo esc_attr( $col ); ?>">
                            <article class="tnt-product<?php echo ( 1 === $count && empty( $g['types'] ) ) ? ' tnt-product--wide' : ''; ?>">
                                <?php
                                $n_img    = count( $imgs );
                                $has_main = $n_img >= 3 || 1 === $n_img;
                                $cols     = 1 === $n_img ? 1 : ( $has_main ? $n_img - 1 : 2 );
                                ?>
                                <div class="tnt-product__gallery" style="--cols:<?php echo (int) $cols; ?>">
                                    <?php foreach ( $imgs as $k => $img ) : ?>
                                        <button type="button" class="tnt-product__img<?php echo ( 0 === $k && $has_main ) ? ' is-main' : ''; ?>" data-tnt-zoom="<?php echo esc_url( tnt_img( $img ) ); ?>" aria-label="Phóng to ảnh <?php echo esc_attr( $item['name'] ); ?>">
                                            <img src="<?php echo esc_url( tnt_img( $img ) ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy">
                                        </button>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tnt-product__body">
                                    <h3><?php echo esc_html( $item['name'] ); ?></h3>
                                    <p><?php echo esc_html( $item['desc'] ); ?></p>
                                    <a class="tnt-link" href="<?php echo esc_url( add_query_arg( 'sp', rawurlencode( $item['name'] ), tnt_page_url( 'lien-he' ) ) . '#bao-gia' ); ?>">Yêu cầu báo giá <?php echo tnt_icon( 'arrow' ); ?></a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <?php get_template_part( 'template-parts/cta' ); ?>
</main>

<?php get_footer(); ?>
