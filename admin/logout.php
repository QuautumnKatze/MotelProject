<?php

// Kiểm tra và xóa cookie liên quan đến username và user_id
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/"); // Xóa cookie username
}

if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, "/"); // Xóa cookie user_id
}
if (isset($_COOKIE['admin'])) {
    setcookie('user_id', '', time() - 3600, "/"); // Xóa cookie user_id
}
header("Location: login.php");
exit();
?>