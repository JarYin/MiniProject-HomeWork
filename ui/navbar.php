<?php include('config.php');
session_start();

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM user WHERE id=$userID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-blue-500 p-4 w-full fixed z-20">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="index.php" class="text-white text-2xl font-bold">Disney Movies</a>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-4">
                <a href="movies.php" class="text-white hover:text-gray-300">Movies</a>
                <a href="reviews.php" class="text-white hover:text-gray-300">Reviews</a>
                <a href="favorites.php" class="text-white hover:text-gray-300">Favorites</a>
                <?php if($row['type'] == 'admin'){ ?>
                    <a href="dashboard.php" class="text-white hover:text-gray-300">Dashboard</a>
                <?php } ?>
            </div>

            <!-- User Authentication -->
            <?php if (isset($_SESSION['userID'])) { ?>
                <div class="hidden md:flex space-x-4">
                    <a href="profile.php" class="text-white hover:text-gray-300"><?php echo $username ?></a>
                    <a href="logout.php" class="text-white hover:text-red-600">Logout</a>
                </div>
            <?php } else { ?>
                <div class="hidden md:flex space-x-4">
                    <a href="login.php" class="text-white hover:text-gray-300">Login</a>
                    <a href="register.php" class="text-white hover:text-gray-300">Register</a>
                </div>
            <?php } ?>

            <!-- Mobile Toggle Button -->
            <button id="toggleBtn" class="text-white hover:text-gray-300 md:hidden">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>

            <!-- Mobile Collapsible Menu -->
            <div id="mobileMenu" class="md:hidden absolute top-16 left-0 right-0 bg-blue-500">
                <a href="#movies" class="block py-2 px-4 text-white hover:bg-blue-600">Movies</a>
                <a href="#reviews" class="block py-2 px-4 text-white hover:bg-blue-600">Reviews</a>
                <a href="#favorites" class="block py-2 px-4 text-white hover:bg-blue-600">Favorites</a>
                <?php 
                if($row['type'] == 'admin'){ ?>
                    <a href="dashboard.php" class="block py-2 px-4 text-white hover:bg-blue-600">Dashboard</a>
                <?php } ?>
                <?php
                if (isset($_SESSION['userID'])) { ?>
                    <a href="profile.php" class="block py-2 px-4 text-white hover:bg-blue-600"><?php echo $username ?></a>
                    <a href="logout.php" class="block py-2 px-4 text-white hover:bg-blue-600">Logout</a>
                <?php } else { ?>
                    <a href="login.php" class="block py-2 px-4 text-white hover:bg-blue-600">Login</a>
                    <a href="register.php" class="block py-2 px-4 text-white hover:bg-blue-600">Register</a>
                <?php } ?>


            </div>

        </div>
    </nav>

    <script>
        document.getElementById('toggleBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>
</body>

</html>