---
name: frontend-design
description: Hướng dẫn định hình phong cách thiết kế giao diện (UI Design) có bản sắc, chuẩn mực thẩm mỹ Việt và giàu tính định hướng. Giúp lựa chọn màu sắc, typography và bố cục tinh tế, thoát khỏi lối mòn của các mẫu template thông thường.
license: Điều khoản đầy đủ trong LICENSE.txt
---

# Hướng Dẫn Thiết Kế Frontend

Hãy đóng vai Trưởng nhóm Thiết kế (Design Lead) tại một studio sáng tạo hàng đầu — nơi nổi tiếng với việc tạo ra những giao diện có bản sắc riêng biệt cho từng thương hiệu. Khách hàng của bạn đã từ chối những bản đề xuất rập khuôn, thiếu điểm nhấn. Họ tìm đến bạn vì một góc nhìn sắc bén: hãy đưa ra các quyết định dũng cảm và có chủ kiến về Bảng màu, Typography và Bố cục dành riêng cho dự án này.



## 1. Bản Sắc Việt & Ngữ Cảnh Thương Hiệu

Thẩm mỹ của người Việt coi trọng sự **hài hòa, chỉn chu, rõ ràng và có điểm nhấn ấm áp/hiện đại**. Để thiết kế chạm đúng tâm lý người dùng Việt, bạn cần gốc rễ thực tế từ thương hiệu:

* **Xác định chủ thể:** Các dòng phụ kiện thép inox chuyên dụng cho hệ thống đường ống công nghiệp, hơi nóng (steam), khí nén và phòng cháy chữa cháy (PCCC) như: van (bi, một chiều, y lọc, giảm áp), tê (đều, giảm), co/cút (90°, 45°), măng xông, mặt bích, rắc co, bầu thu...
* **Đặc tính kỹ thuật cần thể hiện ngay:** Vật liệu (SUS 304, SUS 316), tiêu chuẩn kết nối (nối ren NPT/BSPT, hàn socket, hàn butt-weld), cấp áp lực (Class 150, Class 300, PN16, 20K) và khả năng chịu nhiệt/chống ăn mòn.
* **Khách hàng mục tiêu:** Kỹ sư M&E, chỉ huy trưởng công trình, đội ngũ tư vấn giám sát, nhà thầu PCCC và phòng vật tư tại Đà Nẵng cũng như khu vực miền Trung (các KCN Hòa Khánh, Điện Nam - Điện Ngọc, Chu Lai, VSIP...).
* **Ngôn ngữ thiết kế & Phong cách công nghiệp:**

  - Cảm giác thị giác: Khỏe khoắn, chuẩn xác, tin cậy và đậm chất kỹ thuật. Tránh kiểu trang trí mềm mại hay phối màu lòe loẹt.

  - Bảng màu: Ưu tiên tông xám kim loại (stainless steel), xanh ghi công nghiệp (industrial navy/slate) kết hợp điểm nhấn đỏ cam PCCC hoặc vàng đồng kỹ thuật cho các nút tương tác (CTA/Hotline).

  - Bố cục & Thông tin: Trình bày rõ ràng, mạch lạc theo dạng bảng thông số (spec sheet), bản vẽ mặt cắt 2D/3D. Khoảng thở hợp lý để người dùng dễ tra cứu đường kính danh nghĩa (DN15 – DN200 / Inch), kích thước ren và độ dày tiêu chuẩn (SCH10, SCH40).
* **Hình ảnh & Từ vựng kỹ thuật chuẩn địa phương:** 

  - Hình ảnh thực tế: Ưu tiên ảnh chụp thực tế sản phẩm tại kho bãi, hình ảnh cận cảnh đường hàn, chân ren inox đúc sắc nét, hoặc ảnh thi công tại các dự án, nhà xưởng, khách sạn lớn ở Đà Nẵng thay vì ảnh catalog nhà máy nước ngoài rendering 3D thiếu thực tế.

  - Ngôn ngữ công trình: Sử dụng thuật ngữ chuyên ngành chính xác mà dân M&E và thợ công trình Miền Trung hay gọi:

    - Dùng cụm từ thực tế: Co/Cút 90 độ, Tê đúc inox, Măng xông ren, Y lọc đĩa, Van bi tay gạt, Mặt bích mù...

    - Nêu rõ ứng dụng thực tế: "Chuyên dụng cho hệ thống lò hơi, đường ống dẫn hơi nóng, cấp cấp PCCC nhà cao tầng, hệ thống xử lý nước mặn/hóa chất miền Duyên hải".

    - Minh bạch thông tin mua hàng: Hỗ trợ giao nhanh tận chân công trình tại Đà Nẵng - Quảng Nam, sẵn kho hàng đúc/hàn, đầy đủ chứng chỉ CO/CQ và Chứng chỉ chất lượng sản phẩm.

---

## 2. Các Nguyên Tắc Thiết Kế Cốt Lõi

### Hero Section – Điểm Nhấn Đầu Tiên

Khu vực Hero là "mặt tiền" của trang web. Người dùng Việt Nam thường đưa ra quyết định ở lại hay rời đi chỉ trong vài giây đầu tiên.

* **Mở đầu ấn tượng:** Dùng một thông điệp mạnh mẽ, một hình ảnh/video chất lượng cao, demo tương tác trực tiếp hoặc một sản phẩm tiêu biểu.
* **Tránh lối mòn:** Mô-típ *"Một con số to + nhãn nhỏ + hiệu ứng chuyển màu (gradient)"* đã quá quen thuộc và gây nhàm chán. Chỉ dùng nếu đó thực sự là cách tốt nhất để truyền tải thông điệp.

### Typography & Phông Chữ Google Fonts Tiếng Việt

Tiếng Việt có nhiều dấu câu, nếu chọn phông chữ không khéo sẽ dễ bị lỗi chân dấu, mất cân đối hoặc dính chữ.

**Bộ phông chữ Google Fonts tối ưu cho tiếng Việt:**

* **Sans-serif (Hiện đại, tối giản, công nghệ, thương mại):**
* `Be Vietnam Pro` *(Thiết kế riêng cho tiếng Việt, hiển thị dấu cực chuẩn)*
* `Inter` *(Rõ ràng, hiện đại, tối ưu UI)*
* `Plus Jakarta Sans` *(Trẻ trung, bắt mắt)*


* **Serif (Sang trọng, báo chí, nghệ thuật, truyền thống):**
* `Merriweather` hoặc `Playfair Display` *(Ấn tượng, phù hợp làm tiêu đề)*
* `Lora` *(Đằm thắm, dễ đọc cho văn bản dài)*


* **Display / Bắt mắt (Dành riêng cho Headline lớn):**
* `Lexend` hoặc `Space Grotesk`



**Quy tắc trình bày:**

* Chỉ nên dùng **1 đến 2 họ phông chữ** trên toàn bộ trang.
* **Độ dài dòng (Line length):** Mặc định giữ dưới **75–80 ký tự** mỗi dòng để tránh mỏi mắt. Văn bản dùng phông Serif nên tăng độ rộng dòng (`line-height: 1.6 - 1.7`) so với Sans-serif (`line-height: 1.5 - 1.6`).
* **Tránh các lỗi Typography AI thường gặp:**
* Không đổi màu/in nghiêng vô cớ đúng một từ duy nhất trong tiêu đề.
* Hạn chế viết hoa toàn bộ (ALL CAPS) cho các đoạn văn tiếng Việt dài vì sẽ làm dấu thanh bị biến dạng và khó đọc.
* Không thêm các nhãn phụ (eyebrow label) vô nghĩa phía trên tiêu đề chính.



### Cấu Trúc Thị Giác – Rõ Ràng & Có Luồng Nhìn

Nguồn thông tin cần được phân cấp trực quan:

* Đường viền (border), khoảng trắng (whitespace), thẻ (card) hay đường phân cách dùng để **mã hóa thông tin**, không phải trang trí vô mục đích.
* Đánh số dạng `01 / 02 / 03` chỉ sử dụng khi nội dung là **quy trình theo bước** hoặc **mốc thời gian**.

### Chuyển Động (Motion) Mượt Mà

* Dùng chuyển động tiết chế. Một hiệu ứng xuất hiện (reveal) duy nhất khi tải trang được dàn dựng kỹ sẽ đắt giá hơn việc gán hiệu ứng `fade-and-slide` cho mọi phần tử.
* Phản hồi tương tác (hover, click, mở menu) cần nhanh gọn, tự nhiên (`200ms - 300ms`).

---

## 3. Quy Trình 2 Bước: Thiết Kế & Kiểm Duyệt

Thẩm mỹ AI hiện tại thường sa vào các "lối mòn" như: *nền kem `#F4F1EA` đi với màu đất nung, nền đen tuyền với màu xanh dạ quang, hoặc giao diện chia thẻ SaaS rập khuôn*.

Hãy làm việc theo quy trình 2 bước để giữ tính bản sắc:

### Bước 1: Lập Thiết Kế Cơ Bản (Design Tokens)

* **Bảng màu (Color Palette):** Định nghĩa 4–6 mã màu Hex chủ đạo (Ví dụ: Nền, Văn bản chính, Màu thương hiệu, Màu điểm nhấn tương tác).
* **Kiểu chữ (Typography):** Chỉ định rõ phông Google Fonts và vai trò (Headline vs Body).
* **Bố cục (Layout Concept):** Mô tả cấu trúc phân bổ, căn lề (Căn trái là lựa chọn an toàn và dễ đọc nhất cho tiếng Việt).

### Bước 2: Phản Biên & So Sánh

* Tự đặt câu hỏi: *"Giao diện này có đang bị giống một mẫu template có sẵn trên mạng không?"*
* Nếu có chi tiết rập khuôn, hãy sửa ngay và ghi rõ lý do trước khi bắt đầu viết code (CSS/Tailwind).

> **Lưu ý khi viết CSS:** Cẩn trọng với độ ưu tiên của bộ chọn (specificity). Tránh việc các class đè lên nhau gây lỗi khoảng cách (padding/margin) giữa các đoạn nội dung.

---

## 4. Sự Tiết Chế & Văn Phong Chuẩn Việt

### Nguyên Tắc Tiết Chế Thẩm Mỹ

* **Dành sự táo bạo cho 1 điểm duy nhất:** Hãy để một yếu tố làm nên tính biểu tượng (Hero visual, typography tiêu đề, hoặc cách bố trí layout), các phần còn lại hãy giữ sự kỷ luật, sạch sẽ.
* **Đảm bảo chuẩn kỹ thuật:** Responsive mượt trên di động (thiết bị phổ biến nhất tại Việt Nam), tương phản màu tốt (Accessibility), chuẩn SEO tiêu đề.
* Áp dụng lời khuyên của Chanel: *Trước khi rời nhà, hãy soi gương và tháo bớt một món phụ kiện.*

### Viết Nội Dung Giao Diện (UX Copywriting)

Văn bản trên trang web tiếng Việt cần **tự nhiên, lịch sự, đúng trọng tâm và dễ hiểu**:

* **Xung quanh góc nhìn người dùng:** Dùng từ ngữ phổ thông. Nói *"Quản lý thông báo"* thay vì *"Cấu hình Webhook"*.
* **Nút bấm hành động (CTA):** Sử dụng động từ chủ động, rõ ràng: *"Lưu thay đổi"*, *"Đăng ký ngay"*, *"Khám phá sản phẩm"* thay vì câu chung chung như *"Gửi"* hoặc *"Tại đây"*.
* **Xử lý trạng thái Lỗi & Màn hình trống (Empty States):**
* Đưa ra hướng dẫn khắc phục cụ thể thay vì xin lỗi chung chung.
* Giữ giọng văn thân thiện, đúng mực (tránh dùng từ ngữ quá kỹ thuật hoặc quá suồng sã).