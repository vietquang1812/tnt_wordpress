<?php
/**
 * Main Functions File
 */

define( 'TNT_THEME_DIR', get_template_directory() );
define( 'TNT_THEME_URI', get_template_directory_uri() );

// 1. Nạp Class WP Bootstrap Navwalker
if ( file_exists( TNT_THEME_DIR . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    require_once TNT_THEME_DIR . '/inc/class-wp-bootstrap-navwalker.php';
}

// 2. Nạp các file cấu hình
require_once TNT_THEME_DIR . '/inc/enqueue.php';
require_once TNT_THEME_DIR . '/inc/theme-setup.php';

// 3. Dữ liệu & tiện ích giao diện
require_once TNT_THEME_DIR . '/inc/tnt-data.php';
require_once TNT_THEME_DIR . '/inc/helpers.php';
require_once TNT_THEME_DIR . '/inc/setup-content.php';
require_once TNT_THEME_DIR . '/inc/contact-form.php';
