<?php
include('config.php');
include('ui/navbar.php');
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
        <button class="bg-blue-500 text-white font-bold py-2 mb-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="addToFavorites('${movie.Title}', '${movie.Description}', '${movie.PosterURL}')">Add to Favorites</button>


        <div id="moviesList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Movie Cards will be displayed here -->
        </div>
    </div>

    <script>
        // Fetch movies data from backend and display them
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "get_movies.php", // Set your backend endpoint here
                dataType: "json",
                success: function(data) {
                    displayMovies(data);
                }
            });
        });

        function displayMovies(movies) {
            var moviesList = $("#moviesList");

            movies.forEach(function(movie) {
                var movieCard = `
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <img src="${movie.PosterURL}" alt="${movie.Title}" class="w-full h-48 object-cover mb-4 rounded">
                        <h3 class="text-xl font-bold mb-2">${movie.Title}</h3>
                        <p class="text-gray-700">${movie.Description}</p>
                        <a href="#" class="mt-4 inline-block text-blue-500">Learn More</a>
                    </div>
                `;

                moviesList.append(movieCard);
            });
        }
    </script>
    <!-- Footer -->
    <div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>

</html>