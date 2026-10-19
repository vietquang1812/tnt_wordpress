<?php $tnt = tnt_company(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo esc_url( tnt_img( 'favicon.png' ) ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="tnt-topbar d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex gap-4">
            <a href="<?php echo esc_url( tnt_tel( $tnt['phones'][0] ) ); ?>"><?php echo tnt_icon( 'phone' ); ?><?php echo esc_html( implode( ' – ', $tnt['phones'] ) ); ?></a>
            <a href="mailto:<?php echo esc_attr( $tnt['email'] ); ?>"><?php echo tnt_icon( 'mail' ); ?><?php echo esc_html( $tnt['email'] ); ?></a>
        </div>
        <span class="d-none d-lg-inline"><?php echo tnt_icon( 'pin' ); ?><?php echo esc_html( $tnt['locations'][0]['address'] ); ?></span>
    </div>
</div>

<header class="tnt-header sticky-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand tnt-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <span class="tnt-brand__mark"><img src="<?php echo esc_url( tnt_img( 'logo-tnt.png' ) ); ?>" alt="Logo TNT" width="78" height="52"></span>
                <span class="tnt-brand__text">
                    <small>Công ty Cổ phần</small>
                    <strong>Vật tư Xây dựng <em>TNT</em></strong>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-menu-nav" aria-controls="primary-menu-nav" aria-expanded="false" aria-label="Mở menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="primary-menu-nav">
                <?php
                if ( has_nav_menu( 'primary_menu' ) ) {
                    wp_nav_menu( array(
                        'theme_location'  => 'primary_menu',
                        'depth'           => 2, // Hỗ trợ 2 cấp (Dropdown)
                        'container'       => false,
                        'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
                        'fallback_cb'     => 'tnt_menu_fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ) );
                } else {
                    tnt_menu_fallback();
                }
                ?>
                <a class="btn tnt-btn tnt-btn--accent ms-lg-3 mt-2 mt-lg-0" href="<?php echo esc_url( tnt_tel( $tnt['phones'][0] ) ); ?>">
                    <?php echo tnt_icon( 'phone' ); ?> <?php echo esc_html( $tnt['phones'][0] ); ?>
                </a>
            </div>
        </div>
    </nav>
</header>
