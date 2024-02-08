<?php
include('config.php');
include('ui/navbar.php');

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM user WHERE id = $userID";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
}

$sql = "SELECT * FROM movies WHERE id = " . $_GET['movie_id'];
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql = "SELECT reviews.*, movies.*, users.* 
        FROM reviews 
        INNER JOIN users ON reviews.UserID = users.id 
        INNER JOIN movies ON reviews.MovieID = movies.id
        WHERE reviews.MovieID = " . $_GET['movie_id'];

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
    <title>Movies - Disney Movie Hub</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto pt-20">
        <h1 class="text-3xl font-bold mb-4 text-center">Disney Movies</h1>
        <!-- Add this button in the Movie and Character cards -->
        <?php if (isset($userID) && $rows['type'] == 'user') { ?>
            <button class="bg-blue-500 text-white font-bold py-2 mb-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="addToFavorites('${movie.Title}', '${movie.Description}', '${movie.PosterURL}')">Add to Favorites</button>
        <?php } ?>

        <!-- Movie Cards will be displayed here -->

        <div class="w-4/5 mx-auto bg-white shadow-md rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4"><?php echo $row['Title'] ?></h2>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/2 px-4 mb-4">
                        <img src="image/<?php echo $row['PosterURL'] ?>" alt="Movie Poster" class="w-full">

                    </div>
                    <div class="w-full md:w-1/2 px-4 mb-4">

                        <h3 class="text-lg font-semibold mb-2">Director: <?php echo $row['Director'] ?></h3>
                        <p class="text-xl mb-2 text-gray-500">Genre: <?php echo $row['Genre'] ?></p>
                        <p class="text-xl mb-2 text-gray-500">Release Date: <?php echo $row['ReleaseDate'] ?></p>

                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 p-6 rounded-md">
            <!-- Comment Form -->
            <form action="reviewsDB.php" method="POST">
                <div>
                    <label for="comment" class="block text-gray-700 font-semibold mb-2">Comment:</label>
                    <textarea name="comment" id="comment" rows="3" placeholder="Write your comment here" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
                <input type="hidden" name="movie_id" value="<?php echo $_GET['movie_id']; ?>">
                <button type="submit" name="commentSubmit" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Post Comment</button>
            </form>
        </div>

        <?php if (isset($_SESSION['success'])) { ?>
            <div>
                <p class="text-green-600"><?php echo $_SESSION['success'];
                                            unset($_SESSION['success']); ?></p>
            </div>
        <?php } ?>

        <div class="bg-gray-100 p-4 rounded-md">
            <?php
            if (!is_null($reviews)) {
                foreach ($reviews as $review) { ?>
                    <div class="bg-white rounded-md shadow-md p-4 mb-4">
                        <div class="font-semibold text-lg"><?php echo $review['UserID'] ?> : <span class="text-gray-600"><?php echo $review['Timestamp'] ?></span>
                        </div>
                        <div class="text-gray-700"><?php echo $review['Comment'] ?></div>
                    </div>
            <?php  }
            } else {
                echo "No reviews found.";
            } ?>

        </div>

    </div>


    <!-- Footer -->
    <div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>

</html>