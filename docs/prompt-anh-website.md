# Prompt tạo ảnh cho website TNT
(Prompt tiếng Anh, chú thích tiếng Việt để duyệt. Dùng được cho Midjourney / Flux / Imagen / Nano Banana / GPT-image.)

## 0. Cách dùng
Mỗi ảnh = **[STYLE BLOCK]** + **[PROMPT RIÊNG]** + **[NEGATIVE]**. Dán nối theo thứ tự đó.

### [STYLE BLOCK] – dán ở đầu mọi prompt (giữ cả bộ ảnh đồng nhất)
```
Photorealistic commercial photography for an industrial steel supplier website, shot on a full-frame camera, 35mm or 50mm lens, natural overcast daylight with soft contrast, realistic metal textures (mill scale, brushed steel, slight oxidation), clean and orderly composition, subtle color grade with deep green (#114D22) and small red (#D0141C) accents only where natural (safety vest, paint marking, signage blur), professional, trustworthy, sturdy mood, high detail, sharp focus, no stylization.
```
(Phong cách ảnh chụp thật, thương mại công nghiệp; tông xanh lá đậm + chút đỏ đúng nhận diện TNT; không cách điệu.)

### [NEGATIVE] – dán cuối (hoặc ô negative / "--no")
```
text, letters, numbers, watermark, logo, brand names, readable signs, stamps, certificates, cartoon, 3D render look, CGI, oversaturated, HDR glow, lens flare, distorted hands, extra fingers, deformed steel profiles, warped perspective, people looking at camera, stock-photo smile, clutter
```
(Cấm chữ/logo/con dấu vì AI viết sai; chữ và logo thật chèn sau bằng Canva/Photoshop.)

---

## 1. Ảnh nền lớn (hero / banner)

### 1.1 Hero trang chủ – thay `hero-city.jpg` (tỉ lệ 16:9, xuất ≥ 2400×1350)
```
Wide establishing shot of a steel and construction-materials yard in Da Nang, Vietnam at golden hour: neat stacks of H-beams, round bars and square tubes in the foreground, a gantry crane in the middle ground, modern coastal city skyline and hazy mountains softly blurred in the background, a delivery truck loading steel at the right third, large empty sky area at the top-left for headline text, shallow depth of field.
```
(Bãi thép Đà Nẵng lúc hoàng hôn, cầu trục, thành phố mờ phía sau; chừa khoảng trống trên-trái để đặt tiêu đề.)

### 1.2 Banner các trang con – `page-hero` (21:9, ≥ 2400×1030)
```
Panoramic low-angle close shot of parallel steel I-beams and pipes stacked in a warehouse, strong leading lines converging to the right, dark moody background with soft rim light on the metal edges, left half darker and mostly empty for page title text.
```
(Đường dẫn hướng mắt, nửa trái tối để chèn tiêu đề trang.)

### 1.3 Giới thiệu công ty – thay `about-worker.jpg` (21:8, ≥ 2100×800)
```
Two Vietnamese site engineers in white hard hats and green high-visibility vests inspecting bundles of rebar in a covered warehouse, one holding a tablet and the other pointing at the material, candid working moment, not looking at camera, warm light from a high warehouse window, wide composition with the subjects on the right third.
```
(Hai kỹ sư Việt Nam kiểm tra sắt cây trong kho, ảnh đời thực, không nhìn máy.)

### 1.4 Nền kêu gọi báo giá – thay `cta-tech.jpg` (16:9)
```
Abstract close-up of polished steel plates and bolts with shallow depth of field, dark green and graphite tones, a thin red reflection line across the metal, large smooth dark area on the left for call-to-action text.
```

---

## 2. Ảnh sản phẩm (nền sạch, 4:3, ≥ 1600×1200)
Thêm đoạn này vào mỗi prompt sản phẩm: `studio-quality product photo on a light concrete-grey floor, soft diffused key light with gentle shadow, slight angle, no people`.

| Sản phẩm | Prompt riêng |
|---|---|
| Sắt xây dựng (D16–D20) | `A tight bundle of ribbed deformed steel rebar bars with visible rolling ribs, tied with wire, ends facing the camera, slight natural rust bloom` |
| Thép ống | `Stack of round black steel pipes in a hexagonal pattern, open ends facing the camera showing inner walls, weld seam faintly visible` |
| Thép hộp | `Stacked square and rectangular hollow steel sections, neat rows, clean cut ends, slightly oily dark finish` |
| Thép hình H / I | `Two H-beams and one I-beam leaning on each other in clear profile view, flange and web edges crisp, mill-scale texture` |
| Thép hình U / V | `Stack of U-channel and L-angle steel profiles in orderly layers, end profiles clearly visible` |
| Thép tấm | `Several flat hot-rolled steel plates stacked with a thick edge facing the camera, lifting chain hooks at one side, grey-blue steel tone` |
| Co, tê | `A neat group of butt-weld steel pipe elbows and tees arranged on a surface, bright beveled ends, mix of sizes` |
| Van công nghiệp | `Three industrial gate and ball valves with hand wheels and flanged bodies, painted dark blue and grey, no readable markings` |
| Mặt bích | `Pile of forged steel pipe flanges with bolt holes aligned, raised faces catching light, front-facing hero flange in sharp focus` |
| Inox / phụ kiện inox | `Polished stainless-steel fittings (elbows, tees, unions) arranged on a dark slate surface, crisp reflections, cool white light` |

(Ảnh minh hoạ do AI tạo — sản phẩm thật nên ưu tiên ảnh chụp kho TNT; dùng AI cho nền/banner hoặc khi chưa có ảnh.)

---

## 3. Ảnh lĩnh vực phục vụ (3:2, ≥ 1800×1200)
```
[Công trình sắt thép] Steel-frame factory under construction, workers in helmets assembling H-beam columns with a mobile crane, late afternoon light, scaffolding and bolted connections in sharp detail.
[Điện gió – Thủy điện] Wind turbines on a coastal ridge in central Vietnam at dawn with a hydropower dam and penstock pipes in the lower foreground, mist in the valley, epic but realistic scale.
[Cầu đường] Steel girder bridge over a river in central Vietnam, low angle from the riverbank, bolted girders and bearings visible, clear sky, light traffic.
[Đường sắt] Railway track with steel rails and sleepers curving through green countryside, golden light, telephoto compression, no train or a distant train only.
```

## 4. Ảnh thẻ dịch vụ (1:1 hoặc 4:3)
```
[Kho bãi Đà Nẵng – giao nhanh 24h] Aerial view of an orderly steel warehouse yard with colour-coded stacks and a truck leaving the gate at dusk, warm lights turning on.
[Gia công ren, bích theo bản vẽ] Close-up of a CNC lathe cutting a thread on a steel pipe end, metal shavings and coolant mist, worker's gloved hands out of focus in the background.
[CO/CQ & Mill Test Certificate] Hands in gloves holding a clipboard beside steel plates at an inspection table, a calliper measuring plate thickness, blurred paper on the clipboard with no readable content.
```
(Không để AI vẽ giấy chứng nhận thật — chứng chỉ thật dùng ảnh scan của công ty.)

---

## 5. Quy trình để ảnh “chất lượng”
1. Tạo 4 biến thể mỗi prompt, chọn 1.
2. Phóng to (upscale 2×) rồi nén WebP ~85% (hero ≤ 250 KB, thẻ ≤ 120 KB).
3. Soi lỗi: hình thép bị méo, chữ lạ, tay người. Lỗi nhỏ → inpaint; lỗi nặng → tạo lại.
4. Giữ cùng seed/style block cho cả bộ để màu đồng nhất.
5. Chèn logo và chữ thật bằng Canva/Photoshop, không nhờ AI vẽ.
