<?php
include('config.php');
include('ui/navbar.php');

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM user WHERE id = $userID";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
}

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
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
        <h1 class="text-3xl font-bold mb-4">Disney Movies</h1>
        <!-- Add this button in the Movie and Character cards -->
        <?php if (isset($userID) && $rows['type'] == 'user') { ?>
            <button class="bg-blue-500 text-white font-bold py-2 mb-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="addToFavorites('${movie.Title}', '${movie.Description}', '${movie.PosterURL}')">Add to Favorites</button>
        <?php } ?>

        <div id="moviesList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Movie Cards will be displayed here -->
            <?php while ($row = $result->fetch_assoc()) { ?>
                <a href="detail_movie.php?movie_id=<?php echo $row['id'] ?>" class="movie-card shadow-md mb-2">
                    <img src="image/<?php echo $row['PosterURL'] ?>" alt="Movie Poster" class="w-full">
                    <div class="movie-info p-4">
                        <h2 class="text-2xl font-bold"><?php echo $row['Title'] ?></h2>
                        <p class="text-gray-500"><?php echo $row['Genre'] ?> : <?php echo $row['Director'] ?></p>
                        <p class="text-gray-500"><?php echo $row['ReleaseDate'] ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>

    </div>
    <!-- Footer -->
    <div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>

</html>