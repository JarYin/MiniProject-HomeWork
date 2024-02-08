<?php
include('config.php');
include('ui/navbar.php');

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM user WHERE id = $userID";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
}

$sql = "SELECT reviews.*, movies.*, user.* 
        FROM reviews 
        INNER JOIN user ON reviews.UserID = user.id 
        INNER JOIN movies ON reviews.MovieID = movies.id";

$result = $conn->query($sql);
if ($result) {
    $reviews = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Error executing query: " . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews - Disney Movie Hub</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .container {
        flex: 1;
    }

    .footer {
        background-color: #f8f8f8;

        text-align: center;
    }
</style>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4 pt-20">Disney Movie Reviews</h1>

        <div id="reviewsList" style="overflow: auto;">
            <!-- Reviews will be displayed here -->
            <?php
            if (!empty($reviews)) {
                foreach ($reviews as $review) { ?>
                    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                        <h3 class="text-xl font-bold"><?php echo $review['Title'] ?></h3>
                        <p class="text-gray-700"><?php echo $review['Comment'] ?></p>
                        <p class="text-sm text-gray-500 mt-2">By <?php echo $review['username'] ?> on <?php echo $review['ReleaseDate'] ?></p>
                    </div>
            <?php  }
            } else {
                echo "No reviews found." . $conn->error;
            } ?>
        </div>
    </div>




    <!-- Footer -->
    <div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>

</html>