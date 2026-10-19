<?php
/**
 * Xử lý form "Yêu cầu báo giá" trên trang Liên hệ — gửi email bằng wp_mail().
 * Email nhận: email công ty trong tnt_company(). Đổi bằng filter 'tnt_contact_recipient'.
 * Lưu ý: nên cài plugin SMTP (vd. WP Mail SMTP) để email gửi ổn định.
 */
function tnt_handle_contact_form() {
	$back = wp_get_referer() ? wp_get_referer() : tnt_page_url( 'lien-he' );
	$back = remove_query_arg( 'sent', $back );

	if ( ! isset( $_POST['tnt_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tnt_contact_nonce'] ) ), 'tnt_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'sent', '0', $back ) . '#bao-gia' );
		exit;
	}

	// Honeypot chống spam: bot thường điền trường ẩn này.
	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'sent', '1', $back ) . '#bao-gia' );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$product = sanitize_text_field( wp_unslash( $_POST['product'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	if ( '' === $name || '' === $phone ) {
		wp_safe_redirect( add_query_arg( 'sent', '0', $back ) . '#bao-gia' );
		exit;
	}

	$company = tnt_company();
	$to      = apply_filters( 'tnt_contact_recipient', $company['email'] );
	$subject = sprintf( '[Website TNT] Yêu cầu báo giá từ %s', $name );
	$body    = "Họ tên: {$name}\nĐiện thoại: {$phone}\nEmail: {$email}\nSản phẩm quan tâm: {$product}\n\nNội dung:\n{$message}\n";
	$headers = array();
	if ( $email ) {
		$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
	}

	$ok = wp_mail( $to, $subject, $body, $headers );
	wp_safe_redirect( add_query_arg( 'sent', $ok ? '1' : '0', $back ) . '#bao-gia' );
	exit;
}
add_action( 'admin_post_nopriv_tnt_contact', 'tnt_handle_contact_form' );
add_action( 'admin_post_tnt_contact', 'tnt_handle_contact_form' );
