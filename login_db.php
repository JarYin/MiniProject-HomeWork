<?php
session_start(); // Start the session

include('config.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database based on email
    $sql = "SELECT * FROM user WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Check if the user exists and verify the password
    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['userID'] = $row['id'];
        header('Location: index.php');
        exit();
    } else {
        echo "Invalid email or password";
    }
}
?>
