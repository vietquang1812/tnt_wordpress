<?php
/**
 * Nhúng các file CSS và Javascript từ thư mục assets nội bộ
 */
if ( ! function_exists( 'tnt_enqueue_scripts' ) ) {
    function tnt_enqueue_scripts() {
        // 1. Bootstrap CSS từ thư mục assets/css/
        wp_enqueue_style(
            'bootstrap-css',
            TNT_THEME_URI . '/assets/css/bootstrap.min.css',
            array(),
            '5.3.3'
        );

        // 2. Style.css chính của Theme
        wp_enqueue_style(
            'tnt-style',
            get_stylesheet_uri(),
            array('bootstrap-css'),
            '1.0.0'
        );

        // 3. Bootstrap JS Bundle từ thư mục assets/js/
        wp_enqueue_script(
            'bootstrap-js',
            TNT_THEME_URI . '/assets/js/bootstrap.bundle.min.js',
            array(),
            '5.3.3',
            true // Đặt ở footer
        );
    }
}
add_action( 'wp_enqueue_scripts', 'tnt_enqueue_scripts' );