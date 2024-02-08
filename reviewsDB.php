<?php
session_start();
include('config.php');

if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    $movie_id = $_POST['movie_id'];
    $userID = $_SESSION['userID'];
    $sql = "INSERT INTO reviews (Comment, MovieID, UserID) VALUES ('$comment', '$movie_id', '$userID')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['success'] = "Review added successfully";
        header('Location: detail_movie.php?movie_id='.$movie_id);
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}