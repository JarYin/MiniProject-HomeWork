<?php include('../config.php');
include('navbar.php'); 
$sql = "SELECT * FROM reviews";
$result = mysqli_query($conn, $sql);
$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
                    <ul id="todo-list" class="list-disc pl-5">
                        <?php
                        // Loop through todo items and display them
                        foreach ($reviews as $review) { ?>
                            <li class='shadow-md p-4 mb-2' style='list-style: none;'>
                                <h3><?php echo $review['Title'] ?></h3>
                                <p class="text-gray-500 dark:text-gray-400"><?php echo $review['Genre'] ?></p>
                                <p class="text-gray-500 dark:text-gray-400">วันที่ออกฉาย <?php echo $review['ReleaseDate'] ?></p>
                                <a href="edit_movie.php?edit_id=<?php echo $review['id']; ?>" class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                                <a href="dashboardDB.php?delete_id=<?php echo $review['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded">Delete</a>
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