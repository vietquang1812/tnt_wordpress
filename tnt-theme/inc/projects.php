<?php
/**
 * Dự án: loại bài viết riêng (admin: menu "Dự án").
 * - Tên dự án = tiêu đề bài; Chi tiết = nội dung (không bắt buộc); Ảnh = thư viện 1 hoặc nhiều ảnh.
 * - Thứ tự hiển thị: mặc định mới tạo xếp trước; kéo-thả trong danh sách admin hoặc nhập "Thứ tự" để đổi.
 */

const TNT_PROJECT = 'tnt_project';

/* ---------- 1. Đăng ký loại bài viết ---------- */
function tnt_register_project_type() {
	register_post_type( TNT_PROJECT, array(
		'labels' => array(
			'name'               => 'Dự án',
			'singular_name'      => 'Dự án',
			'menu_name'          => 'Dự án',
			'all_items'          => 'Tất cả dự án',
			'add_new'            => 'Thêm dự án',
			'add_new_item'       => 'Thêm dự án mới',
			'edit_item'          => 'Sửa dự án',
			'new_item'           => 'Dự án mới',
			'view_item'          => 'Xem dự án',
			'search_items'       => 'Tìm dự án',
			'not_found'          => 'Chưa có dự án nào',
			'not_found_in_trash' => 'Không có dự án trong thùng rác',
		),
		'public'              => false,   // không có trang riêng; hiển thị trong trang "Dự Án"
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => false,   // dùng trình soạn thảo cổ điển cho đơn giản
		'menu_position'       => 21,
		'menu_icon'           => 'dashicons-building',
		'supports'            => array( 'title', 'editor', 'page-attributes' ),
		'has_archive'         => false,
		'rewrite'             => false,
	) );
}
add_action( 'init', 'tnt_register_project_type' );

add_filter( 'enter_title_here', function ( $text, $post ) {
	return TNT_PROJECT === $post->post_type ? 'Tên dự án' : $text;
}, 10, 2 );

add_action( 'edit_form_after_title', function ( $post ) {
	if ( TNT_PROJECT === $post->post_type ) {
		echo '<p style="margin:12px 0 4px;font-weight:600">Chi tiết dự án <span style="font-weight:400;color:#646970">(không bắt buộc — để trống nếu không có)</span></p>';
	}
} );

/* ---------- 2. Ảnh dự án ---------- */
/** Danh sách ID ảnh của một dự án (đã lọc ảnh còn tồn tại). */
function tnt_project_image_ids( $post_id ) {
	$raw = get_post_meta( $post_id, '_tnt_gallery', true );
	$ids = array_filter( array_map( 'absint', explode( ',', (string) $raw ) ) );
	return array_values( array_filter( $ids, function ( $id ) {
		return wp_attachment_is_image( $id );
	} ) );
}

function tnt_project_add_metabox() {
	add_meta_box( 'tnt_project_gallery', 'Ảnh dự án (1 hoặc nhiều ảnh)', 'tnt_project_gallery_box', TNT_PROJECT, 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'tnt_project_add_metabox' );

function tnt_project_gallery_box( $post ) {
	wp_nonce_field( 'tnt_project_save', 'tnt_project_nonce' );
	$ids = tnt_project_image_ids( $post->ID );
	?>
	<input type="hidden" id="tnt-gallery-input" name="tnt_gallery" value="<?php echo esc_attr( implode( ',', $ids ) ); ?>">
	<ul id="tnt-gallery-list" class="tnt-gal">
		<?php foreach ( $ids as $id ) : ?>
			<li data-id="<?php echo (int) $id; ?>">
				<?php echo wp_get_attachment_image( $id, 'thumbnail' ); ?>
				<button type="button" class="tnt-gal__rm" aria-label="Bỏ ảnh">&times;</button>
			</li>
		<?php endforeach; ?>
	</ul>
	<p>
		<button type="button" class="button button-primary" id="tnt-gallery-add">Chọn / thêm ảnh</button>
		<span class="description">Ảnh đầu tiên là ảnh đại diện. Kéo thả để đổi thứ tự ảnh.</span>
	</p>
	<style>
		.tnt-gal{display:flex;flex-wrap:wrap;gap:10px;margin:8px 0;padding:0;list-style:none}
		.tnt-gal li{position:relative;width:110px;height:110px;border:1px solid #c3c4c7;background:#f6f7f7;cursor:move}
		.tnt-gal img{width:100%;height:100%;object-fit:cover;display:block}
		.tnt-gal__rm{position:absolute;top:2px;right:2px;width:22px;height:22px;border:0;border-radius:50%;background:#b32d2e;color:#fff;line-height:20px;cursor:pointer;font-size:16px;padding:0}
		.tnt-gal li.ui-sortable-helper{box-shadow:0 4px 12px rgba(0,0,0,.25)}
		.tnt-gal-ph{width:110px;height:110px;border:2px dashed #2271b1;background:#f0f6fc}
	</style>
	<script>
	jQuery(function ($) {
		var $list = $('#tnt-gallery-list'), $input = $('#tnt-gallery-input'), frame;
		function sync() {
			var ids = [];
			$list.children('li').each(function () { ids.push($(this).data('id')); });
			$input.val(ids.join(','));
		}
		$list.sortable({ placeholder: 'tnt-gal-ph', update: sync });
		$list.on('click', '.tnt-gal__rm', function () { $(this).closest('li').remove(); sync(); });
		$('#tnt-gallery-add').on('click', function (e) {
			e.preventDefault();
			if (!frame) {
				frame = wp.media({ title: 'Chọn ảnh dự án', button: { text: 'Thêm vào dự án' }, library: { type: 'image' }, multiple: 'add' });
				frame.on('select', function () {
					frame.state().get('selection').each(function (att) {
						var a = att.toJSON();
						if ($list.children('li[data-id="' + a.id + '"]').length) { return; }
						var src = (a.sizes && a.sizes.thumbnail) ? a.sizes.thumbnail.url : a.url;
						var $li = $('<li>').attr('data-id', a.id).data('id', a.id)
							.append($('<img>').attr('src', src))
							.append('<button type="button" class="tnt-gal__rm" aria-label="Bỏ ảnh">&times;</button>');
						$list.append($li);
					});
					sync();
				});
			}
			frame.open();
		});
	});
	</script>
	<?php
}

function tnt_project_enqueue_admin( $hook ) {
	$screen = get_current_screen();
	if ( ! $screen || TNT_PROJECT !== $screen->post_type ) {
		return;
	}
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		wp_enqueue_media();
		wp_enqueue_script( 'jquery-ui-sortable' );
	}
	if ( 'edit.php' === $hook ) {
		wp_enqueue_script( 'jquery-ui-sortable' );
	}
}
add_action( 'admin_enqueue_scripts', 'tnt_project_enqueue_admin' );

function tnt_project_save( $post_id ) {
	if ( ! isset( $_POST['tnt_project_nonce'] ) || ! wp_verify_nonce( $_POST['tnt_project_nonce'], 'tnt_project_save' ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$ids = isset( $_POST['tnt_gallery'] ) ? array_filter( array_map( 'absint', explode( ',', wp_unslash( $_POST['tnt_gallery'] ) ) ) ) : array();
	$ids = array_values( array_filter( $ids, 'wp_attachment_is_image' ) );
	update_post_meta( $post_id, '_tnt_gallery', implode( ',', $ids ) );
}
add_action( 'save_post_' . TNT_PROJECT, 'tnt_project_save' );

/* ---------- 3. Danh sách trong admin: cột ảnh + thứ tự, kéo thả ---------- */
add_filter( 'manage_' . TNT_PROJECT . '_posts_columns', function ( $cols ) {
	return array(
		'cb'      => $cols['cb'],
		'tnt_img' => 'Ảnh',
		'title'   => 'Tên dự án',
		'tnt_cnt' => 'Số ảnh',
		'tnt_ord' => 'Thứ tự',
		'date'    => 'Ngày tạo',
	);
} );
add_action( 'manage_' . TNT_PROJECT . '_posts_custom_column', function ( $col, $post_id ) {
	if ( 'tnt_img' === $col ) {
		$ids = tnt_project_image_ids( $post_id );
		echo $ids ? wp_get_attachment_image( $ids[0], array( 64, 64 ), false, array( 'style' => 'width:64px;height:64px;object-fit:cover;border-radius:4px' ) ) : '—';
	} elseif ( 'tnt_cnt' === $col ) {
		echo (int) count( tnt_project_image_ids( $post_id ) );
	} elseif ( 'tnt_ord' === $col ) {
		echo '<span class="dashicons dashicons-move" style="color:#8c8f94"></span> ' . (int) get_post_field( 'menu_order', $post_id );
	}
}, 10, 2 );
add_filter( 'manage_edit-' . TNT_PROJECT . '_sortable_columns', function ( $c ) {
	$c['tnt_ord'] = 'menu_order';
	return $c;
} );

/** Sắp xếp mặc định: Thứ tự tăng dần, rồi mới tạo trước. */
function tnt_project_default_order( $q ) {
	if ( is_admin() && $q->is_main_query() && TNT_PROJECT === $q->get( 'post_type' ) && ! $q->get( 'orderby' ) ) {
		$q->set( 'orderby', array( 'menu_order' => 'ASC', 'date' => 'DESC' ) );
	}
}
add_action( 'pre_get_posts', 'tnt_project_default_order' );

/** Kéo thả đổi thứ tự (chỉ khi xem danh sách mặc định). */
function tnt_project_list_dragdrop() {
	$screen = get_current_screen();
	if ( ! $screen || 'edit-' . TNT_PROJECT !== $screen->id || isset( $_GET['orderby'] ) || isset( $_GET['s'] ) || ( isset( $_GET['post_status'] ) && 'trash' === $_GET['post_status'] ) ) {
		return;
	}
	$nonce = wp_create_nonce( 'tnt_pj_order' );
	?>
	<script>
	jQuery(function ($) {
		var $body = $('#the-list');
		$('<div class="notice notice-info inline"><p>Kéo thả các hàng để đổi thứ tự hiển thị trên trang web (trên cùng = hiện đầu tiên).</p></div>').insertBefore('.wp-list-table');
		$body.find('tr').css('cursor', 'move');
		$body.sortable({
			items: 'tr', axis: 'y',
			helper: function (e, tr) { var $o = tr.children(), $h = tr.clone(); $h.children().each(function (i) { $(this).width($o.eq(i).width()); }); return $h; },
			update: function () {
				var ids = [];
				$body.find('tr').each(function () { ids.push(this.id.replace('post-', '')); });
				$.post(ajaxurl, { action: 'tnt_project_reorder', _wpnonce: '<?php echo esc_js( $nonce ); ?>', ids: ids }, function () {
					$body.find('tr').each(function (i) { /* số thứ tự cập nhật sau khi tải lại trang */ });
				});
			}
		});
	});
	</script>
	<?php
}
add_action( 'admin_footer-edit.php', 'tnt_project_list_dragdrop' );

function tnt_project_ajax_reorder() {
	check_ajax_referer( 'tnt_pj_order' );
	if ( ! current_user_can( 'edit_others_posts' ) || empty( $_POST['ids'] ) || ! is_array( $_POST['ids'] ) ) {
		wp_send_json_error();
	}
	global $wpdb;
	$visible = array_values( array_filter( array_map( 'absint', $_POST['ids'] ) ) );
	$all     = get_posts( array(
		'post_type'      => TNT_PROJECT,
		'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'future' ),
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
	) );
	// Đặt lại đúng các "ô" mà các dự án đang hiển thị chiếm trong danh sách đầy đủ.
	$slots = array();
	foreach ( $all as $pos => $id ) {
		if ( in_array( $id, $visible, true ) ) {
			$slots[] = $pos;
		}
	}
	foreach ( $slots as $k => $pos ) {
		if ( isset( $visible[ $k ] ) ) {
			$all[ $pos ] = $visible[ $k ];
		}
	}
	foreach ( $all as $pos => $id ) {
		$wpdb->update( $wpdb->posts, array( 'menu_order' => $pos + 1 ), array( 'ID' => $id ) );
		clean_post_cache( $id );
	}
	wp_send_json_success();
}
add_action( 'wp_ajax_tnt_project_reorder', 'tnt_project_ajax_reorder' );

/* ---------- 4. Truy vấn cho giao diện ---------- */
/** Danh sách dự án đã đăng, đúng thứ tự hiển thị. */
function tnt_get_projects() {
	$q = new WP_Query( array(
		'post_type'      => TNT_PROJECT,
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
		'no_found_rows'  => true,
	) );
	$out = array();
	foreach ( $q->posts as $p ) {
		$imgs = array();
		foreach ( tnt_project_image_ids( $p->ID ) as $id ) {
			$imgs[] = array(
				'thumb' => wp_get_attachment_image_url( $id, 'medium_large' ),
				'full'  => wp_get_attachment_image_url( $id, 'large' ),
				'alt'   => trim( (string) get_post_meta( $id, '_wp_attachment_image_alt', true ) ) ?: $p->post_title,
			);
		}
		$detail = trim( (string) $p->post_content );
		$out[]  = array(
			'id'     => $p->ID,
			'title'  => get_the_title( $p ),
			'detail' => '' !== $detail ? apply_filters( 'the_content', $detail ) : '',
			'media'  => tnt_build_media( $p->ID, $imgs, get_the_title( $p ) ),
		);
	}
	return $out;
}
