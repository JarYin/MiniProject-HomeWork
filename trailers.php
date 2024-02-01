<?php 
include('config.php');
include('ui/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailers - Disney Movie Hub</title>
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
        <h1 class="text-3xl font-bold mb-4 pt-20">Disney Trailers</h1>
        
        <div id="trailersList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Trailer Cards will be displayed here -->
        </div>
    </div>

    <script>
        // Fetch trailers data from backend and display them
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "get_trailers.php", // Set your backend endpoint here
                dataType: "json",
                success: function(data) {
                    displayTrailers(data);
                }
            });
        });

        function displayTrailers(trailers) {
            var trailersList = $("#trailersList");

            trailers.forEach(function(trailer) {
                var trailerCard = `
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <iframe width="100%" height="200" src="${trailer.EmbedURL}" frameborder="0" allowfullscreen></iframe>
                        <h3 class="text-xl font-bold mt-2">${trailer.Title}</h3>
                        <p class="text-gray-700">${trailer.Description}</p>
                    </div>
                `;

                trailersList.append(trailerCard);
            });
        }
    </script>
<!-- Footer -->
<div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>
</html>
