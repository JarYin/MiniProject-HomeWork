<?php
include('config.php');
include('ui/navbar.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Characters - Disney Movie Hub</title>
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
        <h1 class="text-3xl font-bold mb-4 pt-20">Disney Characters</h1>
        <button class="bg-blue-500 text-white font-bold py-2 mb-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="addToFavorites('${movie.Title}', '${movie.Description}', '${movie.PosterURL}')">Add to Favorites</button>
        <div id="charactersList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Character Cards will be displayed here -->
        </div>
    </div>

    <script>
        // Fetch characters data from backend and display them
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "get_characters.php", // Set your backend endpoint here
                dataType: "json",
                success: function(data) {
                    displayCharacters(data);
                }
            });
        });

        function displayCharacters(characters) {
            var charactersList = $("#charactersList");

            characters.forEach(function(character) {
                var characterCard = `
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <img src="${character.ImageURL}" alt="${character.Name}" class="w-full h-48 object-cover mb-4 rounded">
                        <h3 class="text-xl font-bold mb-2">${character.Name}</h3>
                        <p class="text-gray-700">${character.Description}</p>
                    </div>
                `;

                charactersList.append(characterCard);
            });
        }
    </script>
    <!-- Footer -->
    <div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>

</html>