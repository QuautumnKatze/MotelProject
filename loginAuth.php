<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? "";
    $pass = $_POST['password'] ?? "";

    $sql = "select * from users where username = '" . $username . "'";
    $result = $conn->execute_query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (md5($pass, $user['password'])) {
            setcookie('user_id', $user['id'], time() + 7 * 24 * 60 * 60);
            setcookie('username', $user['username'], time() + 7 * 24 * 60 * 60);
            setcookie('name', $user['name'], time() + 7 * 24 * 60 * 60);

            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('Invalid username!'); window.history.back();</script>";
    }
}

?>