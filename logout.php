<?php
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3000);
}
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3000);
}
if (isset($_COOKIE['name'])) {
    setcookie('name', '', time() - 3000);
}
header("Location: login.php");
exit();
?>