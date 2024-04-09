<?php
// Thông tin kết nối đến cơ sở dữ liệu
$host = "localhost"; // Tên host
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL
$database = "ql_khach_san"; // Tên cơ sở dữ liệu

// Kết nối đến cơ sở dữ liệu
$connection = mysqli_connect($host, $username, $password, $database);

// Kiểm tra kết nối
if (!$connection) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
?>
