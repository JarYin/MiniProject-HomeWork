<?php
include('config.php');
session_start();
if (isset($_POST['submitMovie'])) {
    $title = $_POST['title'];
    $release = $_POST['release'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $poster = $_FILES['poster']['name'];
    $target = "../image/" . basename($poster);

    $sql = "INSERT INTO movies (Title, ReleaseDate, Genre, Director, PosterURL) VALUES ('$title', '$release', '$genre', '$director', '$poster')";
    mysqli_query($conn, $sql);

    // Execute SQL query
    // Check if image uploaded successfully

    if (move_uploaded_file($_FILES['poster']['tmp_name'], $target)) {
        $_SESSION['message_movie_upload'] = "Movie uploaded successfully";
        header('location: movies.php');
    } else {
        echo "Failed to upload image";
    }
}


// Check if the form is submitted
if (isset($_POST['EditMovie'])) {
    $id = $_POST['movie_id'];
    $title = $_POST['title'];
    $release = $_POST['release'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $poster = $_FILES['poster']['name'];
    $target = "../image/" . basename($poster);

    $sql = "UPDATE movies SET Title='$title', ReleaseDate='$release', Genre='$genre', Director='$director', PosterURL='$poster' WHERE id = '$id' ";
    mysqli_query($conn, $sql);

    // Execute SQL query
    // Check if image uploaded successfully

    if (move_uploaded_file($_FILES['poster']['tmp_name'], $target)) {
        $_SESSION['message_movie_upload'] = "Movie uploaded successfully";
        header('location: movies.php');
    } else {
        echo "Failed to upload image";
    }
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM movies WHERE id = '$id'";
    mysqli_query($conn, $sql);
    $_SESSION['message_movie_upload'] = "Movie deleted successfully";
    header('location: movies.php');

}
