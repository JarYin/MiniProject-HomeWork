<?php
include('config.php');
// FILEPATH: /c:/xampp/htdocs/MiniProject-HomeWork/profile_db.php
session_start(); // Start the session

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $userID = $_SESSION['userID'];
    $password = $_POST['password'];
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the update query
    $sql = "UPDATE user SET username = '$username', email = '$email', password = '$hashedPassword' WHERE id = $userID";

    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
