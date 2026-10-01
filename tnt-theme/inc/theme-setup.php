<?php
if ( ! function_exists( 'tnt_theme_setup' ) ) {
    function tnt_theme_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        // Đăng ký vị trí Menu
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'tnt-theme' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'tnt_theme_setup' );