<?php
/**
 * Khi kích hoạt theme: tự tạo 4 trang chính, đặt Trang chủ làm trang tĩnh
 * và tạo "Menu chính" gán vào vị trí primary_menu (chỉ tạo nếu chưa có).
 */
function tnt_setup_default_content() {
	$page_ids = array();

	foreach ( array(
		'trang-chu'            => 'Trang chủ',
		'san-pham'             => 'Sản phẩm',
		'chung-chi-chat-luong' => 'Chứng chỉ chất lượng',
		'lien-he'              => 'Thông tin liên hệ',
	) as $slug => $title ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			$page_ids[ $slug ] = $page->ID;
			continue;
		}
		$page_ids[ $slug ] = wp_insert_post( array(
			'post_title'  => $title,
			'post_name'   => $slug,
			'post_status' => 'publish',
			'post_type'   => 'page',
		) );
	}

	// Trang chủ tĩnh.
	if ( ! empty( $page_ids['trang-chu'] ) && 'page' !== get_option( 'show_on_front' ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $page_ids['trang-chu'] );
	}

	// Menu chính.
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( empty( $locations['primary_menu'] ) ) {
		$menu_name = 'Menu chính';
		$menu      = wp_get_nav_menu_object( $menu_name );
		$menu_id   = $menu ? $menu->term_id : wp_create_nav_menu( $menu_name );

		if ( ! is_wp_error( $menu_id ) && ! $menu ) {
			foreach ( $page_ids as $id ) {
				if ( $id && ! is_wp_error( $id ) ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-object-id' => $id,
						'menu-item-object'    => 'page',
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					) );
				}
			}
		}
		if ( ! is_wp_error( $menu_id ) ) {
			$locations['primary_menu'] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tnt_setup_default_content' );
