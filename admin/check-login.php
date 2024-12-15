<?php
if (!isset($_COOKIE['admin']) and !isset($_COOKIE['admin'])) {
    header("Location: login.php");
    exit();
}
?>