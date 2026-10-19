<?php
/**
 * Banner đầu trang con.
 * $args: title, lead, image
 */
$title = $args['title'] ?? get_the_title();
$lead  = $args['lead'] ?? '';
$image = $args['image'] ?? 'hero-city.jpg';
?>
<section class="tnt-page-hero" style="--hero-img:url('<?php echo esc_url( tnt_img( $image ) ); ?>')">
    <div class="container position-relative">
        <nav class="tnt-breadcrumb" aria-label="breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a><span>/</span><span><?php echo esc_html( $title ); ?></span>
        </nav>
        <h1><?php echo esc_html( $title ); ?></h1>
        <?php if ( $lead ) : ?><p><?php echo esc_html( $lead ); ?></p><?php endif; ?>
    </div>
    <div class="tnt-hero__slash" aria-hidden="true"></div>
</section>
