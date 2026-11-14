<?php
/**
 * Video cho bài "Dự án" và "Hoạt động".
 * Nhập mỗi dòng một đường dẫn: YouTube, Vimeo, Facebook hoặc file video (.mp4/.webm), hoặc bấm "Chọn từ thư viện".
 */

/** Phân tích một đường dẫn video; trả về mảng hoặc null nếu không hỗ trợ. */
function tnt_parse_video( $url ) {
	$url = trim( (string) $url );
	if ( ! preg_match( '#^https?://#i', $url ) ) {
		return null;
	}
	if ( preg_match( '#(?:youtube\.com/(?:watch\?(?:[^\s]*&)?v=|embed/|shorts/|live/)|youtu\.be/)([A-Za-z0-9_-]{11})#i', $url, $m ) ) {
		return array(
			'type'  => 'video',
			'kind'  => 'iframe',
			'src'   => 'https://www.youtube-nocookie.com/embed/' . $m[1] . '?autoplay=1&rel=0',
			'thumb' => 'https://i.ytimg.com/vi/' . $m[1] . '/hqdefault.jpg',
		);
	}
	if ( preg_match( '#vimeo\.com/(?:video/)?(\d+)#i', $url, $m ) ) {
		return array(
			'type'  => 'video',
			'kind'  => 'iframe',
			'src'   => 'https://player.vimeo.com/video/' . $m[1] . '?autoplay=1',
			'thumb' => '',
		);
	}
	if ( preg_match( '#(?:facebook\.com|fb\.watch)#i', $url ) ) {
		return array(
			'type'  => 'video',
			'kind'  => 'iframe',
			'src'   => 'https://www.facebook.com/plugins/video.php?href=' . rawurlencode( $url ) . '&show_text=false&autoplay=1',
			'thumb' => '',
		);
	}
	if ( preg_match( '#\.(mp4|webm|ogv|ogg|mov|m4v)(\?.*)?$#i', $url ) ) {
		return array(
			'type'  => 'video',
			'kind'  => 'file',
			'src'   => $url,
			'thumb' => '',
		);
	}
	return null;
}

/** Danh sách đường dẫn video đã lưu của một bài. */
function tnt_post_video_urls( $post_id ) {
	$raw = (string) get_post_meta( $post_id, '_tnt_videos', true );
	return array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $raw ) ) ) );
}

/** Gộp ảnh + video thành một danh sách "media" cho giao diện (video trước, ảnh sau). */
function tnt_build_media( $post_id, $images, $title ) {
	$media = array();
	foreach ( tnt_post_video_urls( $post_id ) as $url ) {
		$v = tnt_parse_video( $url );
		if ( $v ) {
			$v['alt'] = $title;
			$media[]  = $v;
		}
	}
	foreach ( $images as $im ) {
		$im['type'] = 'image';
		$media[]    = $im;
	}
	return $media;
}

/** HTML hiển thị hình thu nhỏ của một mục media (ảnh hoặc video). */
function tnt_media_thumb_html( $it ) {
	if ( 'video' !== $it['type'] ) {
		return '<img src="' . esc_url( $it['thumb'] ) . '" alt="' . esc_attr( $it['alt'] ) . '" loading="lazy">';
	}
	$out = '';
	if ( ! empty( $it['thumb'] ) ) {
		$out .= '<img src="' . esc_url( $it['thumb'] ) . '" alt="' . esc_attr( $it['alt'] ) . '" loading="lazy">';
	} elseif ( 'file' === $it['kind'] ) {
		$out .= '<video src="' . esc_url( $it['src'] ) . '#t=0.1" preload="metadata" muted playsinline tabindex="-1" aria-hidden="true"></video>';
	}
	return $out . '<span class="tnt-pjl__play" aria-hidden="true"><svg viewBox="0 0 24 24" width="26" height="26"><path d="M8 5v14l11-7z" fill="currentColor"/></svg></span>';
}

/* ---------- Ô nhập trong admin ---------- */
function tnt_video_metabox() {
	foreach ( array( TNT_PROJECT, TNT_ACTIVITY ) as $type ) {
		add_meta_box( 'tnt_video_box', 'Video (không bắt buộc)', 'tnt_video_box_html', $type, 'normal', 'high' );
	}
}
add_action( 'add_meta_boxes', 'tnt_video_metabox' );

function tnt_video_box_html( $post ) {
	wp_nonce_field( 'tnt_video_save', 'tnt_video_nonce' );
	$val = implode( "\n", tnt_post_video_urls( $post->ID ) );
	?>
	<p class="description" style="margin-top:0">Mỗi dòng một đường dẫn: link YouTube, Vimeo, Facebook hoặc file video (.mp4, .webm). Video hiện trước các ảnh.</p>
	<textarea id="tnt-videos" name="tnt_videos" rows="4" style="width:100%" placeholder="https://www.youtube.com/watch?v=..."><?php echo esc_textarea( $val ); ?></textarea>
	<?php
	// Video đã có trong thư viện Media (tìm theo đuôi file, không phụ thuộc loại MIME WordPress ghi nhận).
	$files = get_posts( array(
		'post_type'      => 'attachment',
		'post_status'    => 'any',
		'posts_per_page' => 200,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_wp_attached_file',
				'value'   => '\.(mp4|webm|ogv|ogg|mov|m4v)$',
				'compare' => 'REGEXP',
			),
		),
	) );
	?>
	<div style="margin-top:10px">
		<strong>Video có trong Media</strong>
		<?php if ( $files ) : ?>
			<div style="max-height:180px;overflow:auto;border:1px solid #c3c4c7;padding:6px 10px;margin:6px 0;background:#fff">
				<?php foreach ( $files as $f ) : ?>
					<label style="display:block;padding:2px 0">
						<input type="checkbox" class="tnt-video-opt" value="<?php echo esc_url( wp_get_attachment_url( $f->ID ) ); ?>">
						<?php echo esc_html( $f->post_title ? $f->post_title : basename( get_attached_file( $f->ID ) ) ); ?>
						<span class="description">(<?php echo esc_html( basename( (string) get_post_meta( $f->ID, '_wp_attached_file', true ) ) ); ?>)</span>
					</label>
				<?php endforeach; ?>
			</div>
			<button type="button" class="button" id="tnt-video-add">Thêm video đã tick vào danh sách</button>
		<?php else : ?>
			<p class="description">Chưa thấy file video nào trong Media.</p>
		<?php endif; ?>
		<a class="button" href="<?php echo esc_url( admin_url( 'media-new.php' ) ); ?>" target="_blank" rel="noopener">Tải video mới lên Media</a>
		<span class="description">(sau khi tải xong, tải lại trang sửa bài này)</span>
	</div>
	<script>
	jQuery(function ($) {
		$('#tnt-video-add').on('click', function () {
			var $t = $('#tnt-videos'), cur = $.trim($t.val());
			$('.tnt-video-opt:checked').each(function () {
				if (cur.indexOf(this.value) === -1) { cur += (cur ? '\n' : '') + this.value; }
				this.checked = false;
			});
			$t.val(cur);
		});
	});
	</script>
	<?php
}

function tnt_video_save( $post_id ) {
	if ( ! isset( $_POST['tnt_video_nonce'] ) || ! wp_verify_nonce( $_POST['tnt_video_nonce'], 'tnt_video_save' ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$lines = preg_split( '/\r\n|\r|\n/', isset( $_POST['tnt_videos'] ) ? wp_unslash( $_POST['tnt_videos'] ) : '' );
	$keep  = array();
	foreach ( $lines as $l ) {
		$u = esc_url_raw( trim( $l ), array( 'http', 'https' ) );
		if ( $u && tnt_parse_video( $u ) ) {
			$keep[] = $u;
		}
	}
	update_post_meta( $post_id, '_tnt_videos', implode( "\n", array_slice( array_unique( $keep ), 0, 10 ) ) );
}
add_action( 'save_post_' . TNT_PROJECT, 'tnt_video_save' );
add_action( 'save_post_' . TNT_ACTIVITY, 'tnt_video_save' );
