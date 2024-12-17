<?php
include '../config.php';

// Lấy id từ URL
$id = $_GET['id'] ?? null;

if ($id === null) {
    die("ID không được cung cấp.");
}

// Mã hóa mật khẩu mặc định "12345"
$newPassword = "827ccb0eea8a706c4c34a16891f84e7b";

// Cập nhật mật khẩu trong cơ sở dữ liệu
$sql = "UPDATE users SET password = '$newPassword' WHERE id = $id";

if ($result = $conn->query($sql) == TRUE) {
    header("Location: list-user.php?status=success-del");
    exit();
} else {
    header("Location: list-user.php?status=error-del");
    exit();
}
?>