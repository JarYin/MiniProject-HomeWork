<?php
include('config.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = 'user';

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, password, email, type) VALUES ('$username','$hashedPassword' ,'$email' ,'$type')";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_login'] = "คุณได้สมัครสมาชิกเรียบร้อยแล้ว";
        header('Location: login.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
