<?php
include $_SERVER["DOCUMENT_ROOT"] . "/MotelProject/config.php";

header("Content-type: application/json");
session_start();
function dateCompare($str1, $str2){
    $date1 = new DateTime($str1);
    $date2 = new DateTime($str2);

    if($date1 == $date2)
        return 0;
    else
        return $date1 < $date2 ? -1 : 1;
}

if(isset($_POST["otp"])){

    if(!isset($_SESSION["registerData"])){
        echo json_encode([
            "errorRedirect" => "/404.php",
            "message" => "",
            "successRedirect" => "",
        ]);
        die();
    }
    
    $registerData = $_SESSION["registerData"];

    if(dateCompare(date("Y-m-d H:i:s a"), $registerData["expired"]) >=  0){
        unset($_SESSION["registerData"]);
        echo json_encode([
            "errorRedirect" => "",
            "message" => "Mã đã hết hạn vui lòng đăng ký lại!",
            "successRedirect" => "/MotelProject/register.php",
        ]);
        die();
    }

    if($_POST["otp"] != $registerData["otp"]){
        echo json_encode([
            "errorRedirect" => "",
            "message" => "Mã xác thực không trùng khớp!",
            "successRedirect" => "",
        ]);
        die();
    }

    $sql = "
        insert into users(
            name, 
            username, 
            email, 
            password, 
            role,
            phone,
            avatar
        )value(?, ?, ?, ?, ?, ?, ?)
    ";

    $role = 1;
    $avatar = "image/avatar-default.jpg";
    
    $pre = $conn->prepare($sql);
    $pre->bind_param(
        "ssssiss", 
        $registerData["name"], 
        $registerData["username"],
        $registerData["email"],
        $registerData["password"],
        $role,
        $registerData["phone"],
        $avatar
    );
    $pre->execute();

    unset($_SESSION["registerData"]);
    echo json_encode([
        "errorRedirect" => "",
        "message" => "Đăng ký thành công!",
        "successRedirect" => "/MotelProject/login.php"
    ]);
}
else
    echo json_encode([
        "errorRedirect" => "",
        "message" => "Vui lòng nhập đầy đủ thông tin!",
        "successRedirect" => ""
    ]);
