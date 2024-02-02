<?php
session_start(); // Start the session
session_destroy(); // Destroy the session

// Redirect to another page after destroying the session
header("Location: index.php");
exit();
?>
