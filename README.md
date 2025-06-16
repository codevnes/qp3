# KN Holdings WordPress Theme

## Cấu trúc thư mục SASS

Dự án sử dụng cấu trúc 7-1 cho SASS:

- `abstracts/` - Chứa các biến, mixins, functions
- `base/` - Chứa các styles cơ bản, reset
- `components/` - Chứa các thành phần UI nhỏ, tái sử dụng
- `layout/` - Chứa các thành phần layout chính
- `pages/` - Chứa các styles cho từng trang cụ thể
- `main.scss` - File chính import tất cả các thành phần

## Hướng dẫn build SASS

### Cài đặt

```bash
npm install
```

### Các lệnh build SASS

- Build SASS một lần:

```bash
npm run sass
```

- Build SASS và watch các thay đổi:

```bash
npm run sass:watch
```

- Build SASS cho production (minified):

```bash
npm run sass:build
```

## Ghi chú phát triển

Dự án sử dụng file CSS được biên dịch từ SASS. Các file CSS này sẽ được tự động tải trong theme (xem functions.php).

Các file được biên dịch gồm:
- `assets/css/main.css` (development)
- `assets/css/main.min.css` (production)

## Tệp CSS cũ và quá trình di chuyển 

Theme hiện tại vẫn duy trì tệp style.css gốc cho mục đích tương thích ngược. Khi đã chuyển hoàn toàn sang SASS, có thể loại bỏ việc tải style.css trong functions.php. # qp3
