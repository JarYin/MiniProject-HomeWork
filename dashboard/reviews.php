<?php include('../config.php');
include('navbar.php');
if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM user WHERE id = $userID";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
}

$sql = "SELECT reviews.*, movies.*, user.* 
        FROM reviews 
        INNER JOIN user ON reviews.UserID = user.id 
        INNER JOIN movies ON reviews.MovieID = movies.id
       ";

$result = $conn->query($sql);
if ($result) {
    $reviews = $result->fetch_all(MYSQLI_ASSOC);
    // Process $reviews data as needed
} else {
    echo "Error executing query: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Disney Movie Hub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
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

    .box {
        width: 500px;
        height: 500px;
        margin-right: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }
</style>

<body class="bg-gray-100 font-sans">

    <div class="flex h-screen mt-10">
        <div class="w-1/5 bg-gray-800 text-white p-6 h-full">
            <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
            <ul>
                <li class="mb-4"><a href="../dashboard.php">Dashboard</a></li>
                <li class="mb-4"><a href="movies.php">Movies</a></li>
                <li class="mb-4"><a href="reviews.php">Reviews</a></li>
            </ul>
        </div>

        <div class="w-4/5 p-6">
            <h2 class="text-2xl font-bold mb-4">Dashboard Reviews</h2>
            <!-- Your dashboard content goes here -->
            <div class="flex">

                <!-- First box content -->
                <div class="box p-4 w-full" style="overflow: auto;">
                    <!-- Second box content -->
                    <h2 class="text-lg font-semibold mb-2 text-center">All Reviews</h2>
                    <?php if (isset($_SESSION['message_movie_upload'])) {
                        echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">' . $_SESSION['message_movie_upload'] . '</span>
                      </div>';
                        unset($_SESSION['message_movie_upload']);
                    } ?>
                    <ul id="todo-list" class="list-disc pl-5">
                        <?php
                        // Loop through todo items and display them
                        foreach ($reviews as $review) { ?>
                            <li class='shadow-md p-4 mb-2' style='list-style: none;'>
                                <h3 class="mb-2"><?php echo $review['username'] ?> : <?php echo $review['ReleaseDate'] ?></h3>
                                <p class="mb-2 text-gray-500 dark:text-gray-400"><?php echo $review['Title'] ?></p>
                                <p class="mb-2 text-gray-500 dark:text-gray-400"><?php echo $review['Comment'] ?></p>
                                <a href="dashboardDB.php?deleteReview_id=<?php echo $review['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded">Delete</a>
                            </li>
                        <?php }
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="footer">
        <?php include('../ui/footer.php'); ?>
    </div>
</body>

</html>