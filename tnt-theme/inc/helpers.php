<?php
/**
 * Hàm tiện ích dùng trong template.
 */

/** URL ảnh trong assets/images */
function tnt_img( $file ) {
	return TNT_THEME_URI . '/assets/images/' . ltrim( $file, '/' );
}

/** Các trang chính của menu: slug => tiêu đề */
function tnt_main_pages() {
	return array(
		''                     => 'Trang chủ',
		'san-pham'             => 'Sản phẩm',
		'chung-chi-chat-luong' => 'Chứng chỉ chất lượng',
		'lien-he'              => 'Thông tin liên hệ',
	);
}

/** Link tới trang theo slug (trang chủ khi slug rỗng) */
function tnt_page_url( $slug = '' ) {
	if ( '' === $slug ) {
		return home_url( '/' );
	}
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
}

/** Số điện thoại dạng tel: */
function tnt_tel( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
}

/** Menu dự phòng khi chưa gán menu trong Giao diện > Menu */
function tnt_menu_fallback() {
	echo '<ul class="navbar-nav ms-auto mb-2 mb-lg-0">';
	foreach ( tnt_main_pages() as $slug => $title ) {
		$active = ( '' === $slug ) ? is_front_page() : is_page( $slug );
		printf(
			'<li class="nav-item"><a class="nav-link%s" href="%s"%s>%s</a></li>',
			$active ? ' active' : '',
			esc_url( tnt_page_url( $slug ) ),
			$active ? ' aria-current="page"' : '',
			esc_html( $title )
		);
	}
	echo '</ul>';
}

/** Icon SVG nội tuyến (stroke theo currentColor) */
function tnt_icon( $name ) {
	$paths = array(
		'phone'  => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/>',
		'mail'   => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/>',
		'pin'    => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
		'doc'    => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h5"/>',
		'eye'    => '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>',
		'target' => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
		'heart'  => '<path d="M12 21s-7-4.5-9.5-9A5.5 5.5 0 0 1 12 6a5.5 5.5 0 0 1 9.5 6c-2.5 4.5-9.5 9-9.5 9z"/>',
		'shield' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
		'truck'  => '<path d="M1 3h15v13H1zM16 8h4l3 3v5h-7z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>',
		'clock'  => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
		'users'  => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/>',
		'arrow'  => '<path d="M5 12h14M13 5l7 7-7 7"/>',
		'zoom'   => '<circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3M11 8v6M8 11h6"/>',
		'check'  => '<path d="M20 6 9 17l-5-5"/>',
	);
	if ( empty( $paths[ $name ] ) ) {
		return '';
	}
	return '<svg class="tnt-icon" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $paths[ $name ] . '</svg>';
}
