<?php 
include('config.php');
include('ui/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites - Disney Movie Hub</title>
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
    </style>
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4 pt-20">My Favorites</h1>
        
        <div id="favoritesList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Favorite Movie Cards will be displayed here -->
        </div>
    </div>

    <script>
        // Fetch favorite movies from local storage and display them
        $(document).ready(function() {
            displayFavorites();
        });

        function displayFavorites() {
            var favoritesList = $("#favoritesList");
            favoritesList.empty(); // Clear previous content

            // Retrieve favorite movies from local storage
            var favorites = JSON.parse(localStorage.getItem("favorites")) || [];

            favorites.forEach(function(favorite) {
                var favoriteCard = `
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <img src="${favorite.PosterURL}" alt="${favorite.Title}" class="w-full h-48 object-cover mb-4 rounded">
                        <h3 class="text-xl font-bold mb-2">${favorite.Title}</h3>
                        <p class="text-gray-700">${favorite.Description}</p>
                    </div>
                `;

                favoritesList.append(favoriteCard);
            });
        }
    </script>
<!-- Footer -->
<div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>
</html>
