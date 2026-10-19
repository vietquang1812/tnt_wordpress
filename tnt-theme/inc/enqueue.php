<?php
/**
 * Nhúng các file CSS và Javascript từ thư mục assets nội bộ
 */
if ( ! function_exists( 'tnt_enqueue_scripts' ) ) {
    function tnt_enqueue_scripts() {
        // 0. Font chữ Be Vietnam Pro (hỗ trợ tiếng Việt đầy đủ)
        wp_enqueue_style(
            'tnt-fonts',
            'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap',
            array(),
            null
        );

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

        // 3. Giao diện TNT
        wp_enqueue_style(
            'tnt-main',
            TNT_THEME_URI . '/assets/css/main.css',
            array('bootstrap-css', 'tnt-fonts'),
            filemtime( TNT_THEME_DIR . '/assets/css/main.css' )
        );

        // 4. Bootstrap JS Bundle từ thư mục assets/js/
        wp_enqueue_script(
            'bootstrap-js',
            TNT_THEME_URI . '/assets/js/bootstrap.bundle.min.js',
            array(),
            '5.3.3',
            true // Đặt ở footer
        );

        // 5. JS của theme (header thu gọn, xem ảnh phóng to)
        wp_enqueue_script(
            'tnt-main',
            TNT_THEME_URI . '/assets/js/main.js',
            array('bootstrap-js'),
            filemtime( TNT_THEME_DIR . '/assets/js/main.js' ),
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'tnt_enqueue_scripts' );
