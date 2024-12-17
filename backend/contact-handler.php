<?php
include '../config.php'; // Kết nối CSDL

// Kiểm tra nếu form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Xử lý lỗi nếu dữ liệu không hợp lệ
    if (empty($email) || empty($message)) {
        die("Dữ liệu không hợp lệ.");
    }

    // Chuẩn bị câu lệnh SQL
    $sql = "INSERT INTO messages (created_at, email, message) VALUES (NOW(), '$email', '$message')";
    // Thực thi truy vấn
    if ($result = $conn->query($sql) == TRUE) {
        header('Location: ../contact.php?status=success');
    } else {
        header('Location: ../contact.php?status=error');
    }
} else {
    echo "Truy cập không hợp lệ.";
}
?>