<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldPassword = md5($_POST['passwordOld']);
    $newPassword = md5($_POST['passwordNew']);
    $confirmPassword = md5($_POST['passwordConfirm']);


    session_start();
    $id = $_COOKIE['user_id'];

    // Kiểm tra mật khẩu cũ
    $sql = "SELECT password FROM users WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['password'] !== $oldPassword) {
            // Mật khẩu cũ không đúng
            header("Location: ../profile.php?status=error-old");
            exit();
        }

        // Kiểm tra mật khẩu mới và xác nhận mật khẩu
        if ($newPassword !== $confirmPassword) {
            // Mật khẩu mới và xác nhận không khớp
            header("Location: ../profile.php?status=error-confirm");
            exit();
        }

        // Mã hóa và cập nhật mật khẩu mới
        $hashedPassword = md5($newPassword);
        $updateSql = "UPDATE users SET password = '$hashedPassword' WHERE id = '$id'";
        if ($conn->query($updateSql) === TRUE) {
            // Đổi mật khẩu thành công
            header("Location: ../profile.php?status=success-pass");
            exit();
        } else {
            // Lỗi khi cập nhật mật khẩu
            header("Location: ../profile.php?status=error-pass");
            exit();
        }
    } else {
        // Không tìm thấy user
        header("Location: ../profile.php?status=error-pass");
        exit();
    }
}
?>