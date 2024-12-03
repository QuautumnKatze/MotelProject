<?php
include('../config.php');

// Kiểm tra reCAPTCHA
$recaptchaSecretKey = '6LdMy5AqAAAAACdet8vyGkCChRAceCm52wMma4pv';
$recaptchaResponse = $_POST['g-recaptcha-response'];

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse");
$responseKeys = json_decode($response, true);

if (intval($responseKeys["success"]) !== 1) {
    echo 'Hãy hoàn thành captcha';
    exit;
}

// Lấy thông tin từ form
$username = $_POST['username'];
$password = md5($_POST['password']); // Mã hóa mật khẩu với MD5

// Truy vấn kiểm tra tài khoản
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lấy dữ liệu người dùng
    $user = $result->fetch_assoc();

    // Lưu thông tin người dùng vào cookie
    setcookie('username', $user['username'], time() + (3600), "/");
    setcookie('user_id', $user['id'], time() + (3600), "/");

    // Chuyển hướng đến trang index
    header("Location: ../index.php");
    exit();
} else {
    echo "Invalid username or password.";
}
?>