<?php
/* Thông tin CSDL. Giả sử bạn đang chạy MySQL Server với thiết lập mặc định (user 'root' và không có mật khẩu) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'th01_web_nc');

/* Cố gắng kết nối với cơ sở dữ liệu MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Kiểm tra kết nối
if ($link === false) {
    die("ERROR: Không thể kết nối. " . mysqli_connect_error());
}