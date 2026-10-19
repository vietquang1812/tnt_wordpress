<?php
/**
 * Dữ liệu nội dung của website TNT (lấy từ Hồ sơ năng lực / Product Catalog).
 * Sửa thông tin công ty, sản phẩm tại đây — các trang sẽ tự cập nhật.
 */

if ( ! function_exists( 'tnt_company' ) ) {
	function tnt_company() {
		return array(
			'name'       => 'Công ty Cổ phần Vật tư Xây dựng TNT',
			'short'      => 'Vật tư Xây dựng TNT',
			'tax_code'   => '0402034993',
			'founded'    => '01/04/2020',
			'capital'    => '5.500.000.000 đồng',
			'director'   => 'Lê Văn Trung',
			'phones'     => array( '0902.272.462', '0325.225.456' ),
			'email'      => 'theptnt2020@gmail.com',
			'locations'  => array(
				// array(
				// 	'label'   => 'Trụ sở chính',
				// 	'address' => 'Số 5 Lê Đại, Phường Hòa Cường Bắc, Quận Hải Châu, TP. Đà Nẵng',
				// ),
				array(
					'label'   => 'Kho số 1',
					'address' => 'Số 617 Nguyễn Lương Bằng, Phường Liên Chiểu, TP. Đà Nẵng',
				),
				array(
					'label'   => 'Kho số 2',
					'address' => 'Số 111 Trần Đại Nghĩa, Phường Ngũ Hành Sơn, TP. Đà Nẵng',
				),
			),
		);
	}
}

/**
 * Nhóm sản phẩm. 'images' là tên file trong assets/images.
 */
if ( ! function_exists( 'tnt_product_groups' ) ) {
	function tnt_product_groups() {
		return array(
			array(
				'id'    => 'sat-xay-dung',
				'title' => 'Sắt xây dựng',
				'intro' => 'Sắt thép xây dựng cho bê tông cốt thép: nhà ở, nhà xưởng, cầu đường và hạ tầng.',
				'items' => array(
					array( 'name' => 'Sắt thép xây dựng', 'desc' => 'Thép thanh vằn (sắt cây) D16, D18, D20…, thép cuộn và thép tròn trơn — bó đủ cây, giao hàng tận công trình.', 'images' => array( 'sat-xay-dung-1.jpg', 'sat-xay-dung-2.jpg', 'sat-xay-dung-3.jpg' ) ),
				),
			),
			array(
				'id'    => 'thep-ong-hop',
				'title' => 'Thép ống – Thép hộp',
				'intro' => 'Thép ống tròn, thép hộp vuông và hộp chữ nhật dùng cho kết cấu, nhà xưởng, hệ thống đường ống và gia công cơ khí.',
				'items' => array(
					array( 'name' => 'Thép ống tròn', 'desc' => 'Ống đen, ống mạ kẽm nhiều đường kính và độ dày.', 'images' => array( 'thep-ong-1.jpg', 'thep-ong-2.jpg', 'thep-ong-3.jpg' ) ),
					array( 'name' => 'Thép hộp vuông – chữ nhật', 'desc' => 'Hộp đen, hộp mạ kẽm cho khung kèo, lan can, kết cấu phụ.', 'images' => array( 'thep-hop-1.jpg', 'thep-hop-2.jpg', 'thep-hop-3.jpg', 'thep-hop-4.jpg' ) ),
				),
			),
			array(
				'id'    => 'thep-hinh',
				'title' => 'Thép hình U, I, V, H',
				'intro' => 'Thép hình chịu lực cho kết cấu nhà thép tiền chế, cầu, nhà máy và công trình công nghiệp.',
				'items' => array(
					array( 'name' => 'Thép chữ H', 'desc' => 'Dầm, cột chịu tải lớn cho nhà xưởng và kết cấu thép.', 'images' => array( 'thep-h-1.jpg', 'thep-h-2.jpg', 'thep-h-3.jpg' ) ),
					array( 'name' => 'Thép chữ I', 'desc' => 'Dầm chính, dầm cầu trục, khung sàn.', 'images' => array( 'thep-i-1.jpg', 'thep-i-2.jpg', 'thep-i-3.jpg' ) ),
					array( 'name' => 'Thép chữ V', 'desc' => 'Thép góc đều cạnh cho giằng, khung, giá đỡ.', 'images' => array( 'thep-v-1.jpg', 'thep-v-2.jpg', 'thep-v-3.jpg' ) ),
				),
			),
			array(
				'id'    => 'thep-tam',
				'title' => 'Thép tấm',
				'intro' => 'Thép tấm cán nóng, tấm mạ nhiều độ dày phục vụ chế tạo, đóng bản mã, sàn và kết cấu.',
				'items' => array(
					array( 'name' => 'Thép tấm các loại', 'desc' => 'Cắt theo quy cách yêu cầu.', 'images' => array( 'thep-tam-1.jpg', 'thep-tam-2.jpg', 'thep-tam-3.jpg' ) ),
				),
			),
			array(
				'id'    => 'co-te',
				'title' => 'Co, tê',
				'intro' => 'Co, tê, côn, chén hàn thép carbon và inox cho hệ thống đường ống công nghiệp.',
				'items' => array(
					array( 'name' => 'Co, tê SCH 24 – 40 – 80', 'desc' => 'Phụ kiện hàn thép carbon nhiều độ dày.', 'images' => array( 'pk-co-te-1.jpg', 'pk-co-te-2.jpg' ) ),
					array( 'name' => 'Co, tê inox hàn ren SCH10, SCH40', 'desc' => 'Phụ kiện inox cho thực phẩm, hóa chất, đường ống công nghệ.', 'images' => array( 'pk-inox-1.jpg', 'pk-inox-2.jpg', 'pk-inox-3.jpg' ) ),
				),
			),
			array(
				'id'    => 'van-cong-nghiep',
				'title' => 'Van công nghiệp',
				'intro' => 'Van cổng, van cầu, van bướm, van một chiều, van an toàn… bằng gang, thép, đồng và inox.',
				'items' => array(
					array( 'name' => 'Van công nghiệp các loại', 'desc' => 'Kết nối bích, ren, hàn cho nước, hơi, khí và dầu.', 'images' => array( 'van-1.jpg', 'van-2.jpg', 'van-3.jpg' ) ),
				),
			),
			array(
				'id'    => 'mat-bich',
				'title' => 'Mặt bích',
				'intro' => 'Mặt bích chế tạo từ thép carbon, thép không gỉ và gang; đảm bảo độ bền, chống ăn mòn và chịu áp lực tốt. Tuân thủ tiêu chuẩn ANSI, ASME, DIN, JIS, PN10, PN16.',
				'types' => array( 'Pipe flange', 'Blind flange', 'Welding neck', 'Slip on', 'Socket weld', 'Threaded', 'Lap joint', 'Plate flange', 'Reducing', 'DIN', 'ANSI', 'Forged steel', 'Long weld neck', 'Ring joint', 'ASME', 'Steel lap joint', 'ASTM', 'PN flange', 'Puddle flange', 'Split flange', 'Cast flange', 'Orifice flange', 'PTFE lined', 'SO flange' ),
				'items' => array(
					array( 'name' => 'Mặt bích tiêu chuẩn ANSI, ASME, DIN, JIS', 'desc' => 'Đủ chủng loại theo bảng bên cạnh.', 'images' => array( 'mat-bich.jpg' ) ),
				),
			),
			array(
				'id'    => 'ron-dong-ho',
				'title' => 'Ron, khớp nối & đồng hồ',
				'intro' => 'Gioăng, ron làm kín, khớp nối trục, khớp giãn nở và đồng hồ đo áp suất, đo lưu lượng.',
				'items' => array(
					array( 'name' => 'Ron, khớp nối', 'desc' => 'Khớp nối mềm, khớp nối trục, ron làm kín.', 'images' => array( 'ron-khop-1.jpg', 'ron-khop-2.jpg' ) ),
					array( 'name' => 'Đồng hồ đo', 'desc' => 'Đồng hồ áp suất, nhiệt độ, đồng hồ lưu lượng điện từ.', 'images' => array( 'dong-ho-1.jpg', 'dong-ho-2.jpg' ) ),
				),
			),
		);
	}
}

/**
 * Lĩnh vực công trình (mục "Dự án tiêu biểu" trong catalogue).
 */
if ( ! function_exists( 'tnt_project_fields' ) ) {
	function tnt_project_fields() {
		return array(
			array( 'title' => 'Công trình sắt thép', 'desc' => 'Nhà máy, nhà xưởng, cao ốc và kết cấu thép công nghiệp.', 'image' => 'ct-sat-thep-1.jpg' ),
			array( 'title' => 'Điện gió – Thủy điện', 'desc' => 'Đập thủy điện, trạm biến áp, trang trại điện gió và điện mặt trời.', 'image' => 'ct-thuy-dien-1.jpg' ),
			array( 'title' => 'Cầu đường', 'desc' => 'Cầu vượt, trụ cầu, nút giao và đường cao tốc.', 'image' => 'ct-cau-duong-1.jpg' ),
			array( 'title' => 'Đường sắt', 'desc' => 'Thi công, cải tạo tuyến ray và hạ tầng đường sắt.', 'image' => 'ct-duong-sat-2.jpg' ),
		);
	}
}
