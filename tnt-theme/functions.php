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