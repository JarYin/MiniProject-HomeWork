<?php 
    include 'config.php';
    include './ui/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disney Movie Hub</title>
    <!-- เชื่อมต่อกับไฟล์ CSS ของ Tailwind -->
</head>
<body class="bg-gray-100 font-sans">
    <!-- Hero Section -->
    <header class="bg-cover bg-center h-screen relative flex items-center justify-center" style="background-image: url('hero-background.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="text-center text-white z-10">
            <h1 class="text-5xl font-bold leading-tight mb-4">Discover the Magic of Disney Movies</h1>
            <p class="text-lg">Explore a world of enchanting stories and characters.</p>
            <a href="movies.php" class="mt-6 inline-block px-6 py-3 bg-yellow-500 text-white rounded-full">Explore Movies</a>
        </div>
    </header>

    <!-- Featured Movies -->
    <!-- <section id="movies" class="container mx-auto my-12 my-12">
        <h2 class="text-3xl font-bold mb-6">Featured Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8"> -->
            <!-- Movie Cards go here -->
            <!-- <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="movie1.jpg" alt="Movie 1" class="w-full h-48 object-cover mb-4 rounded">
                <h3 class="text-xl font-bold mb-2">The Lion King</h3>
                <p class="text-gray-700">An animated classic about the circle of life.</p>
                <a href="#" class="mt-4 inline-block text-blue-500">Learn More</a>
            </div> -->
            <!-- Repeat for other movies -->
        <!-- </div>
    </section> -->

    <!-- Footer -->
    <?php include('ui/footer.php') ?>

</body>
</html>
