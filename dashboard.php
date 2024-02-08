<?php include('config.php');
include('./ui/navbar.php');

$sql = "SELECT id FROM movies";
$result = mysqli_query($conn, $sql);

// เก็บ ID ทั้งหมดไว้ในตัวแปร
$lastId = null;
while ($row = mysqli_fetch_assoc($result)) {
    $ids[] = $row['id'];
    $lastId = $row['id']; // เก็บค่า ID ของแถวล่าสุด
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

    <div class="flex h-screen mt-16">
        <div class="w-1/5 bg-gray-800 text-white p-6 h-full">
            <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
            <ul>
                <li class="mb-4"><a href="dashboard.php">Dashboard</a></li>
                <li class="mb-4"><a href="./dashboard/movies.php">Movies</a></li>
                <li class="mb-4"><a href="./dashboard/reviews.php">Reviews</a></li>
            </ul>
        </div>

        <div class="w-4/5 mx-auto bg-white shadow-md rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/2 px-4 mb-4">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-2">Total Movies</h3>
                            <p class="text-xl"><?php echo "Total Movies: " . $lastId; ?></p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-4 mb-4">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-2">Total Reviews</h3>
                            <p class="text-xl"><?php echo "Total Reviews: " . $lastId; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <?php include('./ui/footer.php'); ?>
    </div>
</body>

</html>