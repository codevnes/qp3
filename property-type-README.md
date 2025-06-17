# Hướng dẫn sử dụng tính năng Loại hình BĐS

## Giới thiệu

Tính năng "Loại hình BĐS" cho phép quản lý và hiển thị các loại hình bất động sản khác nhau trên website. Mỗi loại hình BĐS có thể có các thông tin đặc trưng như hình ảnh đại diện, mô tả ngắn, đặc điểm nổi bật, công năng sử dụng, phong cách thiết kế, vật liệu, và nhiều thông tin khác.

## Quản lý Loại hình BĐS

1. Trong trang quản trị WordPress, vào mục **Sản phẩm BĐS > Loại hình BĐS**
2. Tại đây bạn có thể:
   - Thêm loại hình BĐS mới
   - Chỉnh sửa loại hình BĐS hiện có
   - Xóa loại hình BĐS

## Thêm Loại hình BĐS mới

1. Vào **Sản phẩm BĐS > Loại hình BĐS > Thêm loại hình**
2. Điền thông tin cơ bản:
   - **Tên**: Tên loại hình BĐS (ví dụ: Biệt thự, Căn hộ, Nhà phố...)
   - **Slug**: Đường dẫn URL (tự động tạo từ tên, có thể chỉnh sửa)
   - **Loại hình cha**: Nếu là loại hình con của một loại hình khác
   - **Mô tả**: Mô tả chung về loại hình (không bắt buộc)

3. Điền thông tin bổ sung (trường ACF):
   - **Ảnh đại diện**: Hình ảnh đại diện cho loại hình BĐS
   - **Mô tả ngắn**: Đoạn mô tả ngắn gọn về loại hình
   - **Đặc điểm nổi bật**: Các đặc điểm nổi bật của loại hình BĐS (thêm nhiều mục)
   - **Phối màu chính**: Các màu sắc chính của loại hình BĐS
   - **Vật liệu tiêu biểu**: Các loại vật liệu thường được sử dụng
   - **Công năng sử dụng**: Mục đích và công năng sử dụng
   - **Layout mặt bằng**: Hình ảnh mặt bằng điển hình
   - **Phong cách thiết kế**: Phong cách thiết kế của loại hình
   - **Ghi chú khác**: Thông tin bổ sung khác

4. Nhấn **Thêm loại hình** để lưu lại

## Hiển thị Loại hình BĐS trên website

### 1. Trang chi tiết Loại hình BĐS

Mỗi loại hình BĐS sẽ có một trang riêng hiển thị đầy đủ thông tin và các sản phẩm BĐS thuộc loại hình đó. Đường dẫn mặc định là: `/loai-hinh-bds/ten-loai-hinh/`

### 2. Trang danh sách Loại hình BĐS

Để tạo trang hiển thị tất cả các loại hình BĐS:
1. Tạo trang mới
2. Chọn Template là "Danh sách loại hình BĐS"
3. Xuất bản trang

### 3. Sử dụng shortcode

Có 2 shortcode để hiển thị loại hình BĐS:

#### Hiển thị danh sách Loại hình BĐS

```
[property_types_grid count="6" columns="3"]
```

Tham số:
- `count`: Số lượng loại hình BĐS muốn hiển thị (mặc định: 6)
- `columns`: Số cột hiển thị (mặc định: 3)

#### Hiển thị Sản phẩm BĐS theo Loại hình

```
[properties_by_type type="biet-thu" count="3" columns="3"]
```

Tham số:
- `type`: Slug của loại hình BĐS (bắt buộc)
- `count`: Số lượng sản phẩm muốn hiển thị (mặc định: 3)
- `columns`: Số cột hiển thị (mặc định: 3)

## Quản lý Sản phẩm BĐS

1. Vào **Sản phẩm BĐS > Tất cả sản phẩm BĐS**
2. Khi thêm/chỉnh sửa sản phẩm, bạn có thể chọn Loại hình BĐS cho sản phẩm đó
3. Mỗi sản phẩm có thể thuộc nhiều loại hình BĐS khác nhau

## Ghi chú

- Để hiển thị các icon, hệ thống sử dụng Font Awesome 5
- Hình ảnh được tải lên nên có kích thước tối thiểu 800x600px để đảm bảo chất lượng hiển thị
- Trang loại hình BĐS sẽ tự động liệt kê các sản phẩm BĐS thuộc loại hình đó 