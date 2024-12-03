<?php 
include "config.php";

// Trong tệp php.ini
// [mail function]
// SMTP=stmp.gmail.com
// smtp_port=587
// sendmail_from=Nhập email
// sendmail_path="\"Đường dẫn tới file sendmail.exe" -t"

// Trong tệp sendmail.ini
// [sendmail]
// smtp_server=smtp.gmail.com
// smtp_port=587
// smtp_ssl=auto
// default_domain=localhost
// error_logfile=error.log
// debug_logfile=debug.log
// auth_username=Nhập email
// auth_password=Nhập mật khẩu ứng dụng
// force_sender=Nhập email

header("Content-type: application/json");
session_start();

if(
    isset($_POST["username"]) &&
    isset($_POST["email"]) &&
    isset($_POST["name"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["password"]) &&
    isset($_POST["passwordConfirm"])
){

    if($_POST["password"] != $_POST["passwordConfirm"]){
        echo json_encode([
            "errorRedirect" => "",
            "message" => "Mật khẩu xác thực nhập không trùng khớp!",
            "successRedirect" => "",
        ]);
        die();
    }
    
    $pre = $conn->prepare("select count(*) as 'count' from users where username = ? or email = ?");
    $pre->bind_param("ss", $_POST["username"], $_POST["email"]);
    $pre->execute();
    $data = $pre->get_result()->fetch_assoc();

    if($data["count"] != 0){
        echo json_encode([
            "errorRedirect" => "",
            "message" => "Tài khoản hoặc email đã tồn tại!",
            "successRedirect" => "",
        ]);
        die();
    }
    
    $otp = "";
    for($i = 1; $i <= 6; $i++)
        $otp .= rand(0, 9);

    $message = "
        <p>Mã xác thực của bạn là: <b>$otp</b></p>
        <p>Bạn có 2 phút để xác thực!</p>
    ";

    mail(
        additional_headers: [
            "MIME-Version" => "1.0",
            "Content-type" => "text/html; charset=UTF-8"
        ],
        to: $_POST["email"],
        subject: "Xác Thực Tài Khoản",
        message: $message
    );

    $_SESSION["registerData"] = [
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "name" => $_POST["name"],
        "phone" => $_POST["phone"],
        "password" => md5($_POST["password"]),
        "otp" => $otp,
        "expired" => date("Y-m-d H:i:s a", strtotime("+2 Minutes")),
    ];

    echo json_encode([
        "errorRedirect" => "",
        "message" => "Chúng tôi đã gửi mã xác thực tới email của bạn, mã hết hạn sau 2 phút!",
        "successRedirect" => "/MotelProject/verifyEmail.php",
    ]);
}
else
    echo json_encode([
        "message" => "Vui lòng điền đầy đủ thông tin!",
    ]);
