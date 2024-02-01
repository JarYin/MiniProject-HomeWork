<?php 
include('config.php');
include('ui/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews - Disney Movie Hub</title>
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
        <h1 class="text-3xl font-bold mb-4 pt-20">Disney Movie Reviews</h1>
        
        <div id="reviewsList">
            <!-- Reviews will be displayed here -->
        </div>
    </div>

    <script>
        // Fetch reviews data from backend and display them
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "get_reviews.php", // Set your backend endpoint here
                dataType: "json",
                success: function(data) {
                    displayReviews(data);
                }
            });
        });

        function displayReviews(reviews) {
            var reviewsList = $("#reviewsList");

            reviews.forEach(function(review) {
                var reviewCard = `
                    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                        <h3 class="text-xl font-bold">${review.Title}</h3>
                        <p class="text-gray-700">${review.Content}</p>
                        <p class="text-sm text-gray-500 mt-2">By ${review.Author} on ${review.Date}</p>
                    </div>
                `;

                reviewsList.append(reviewCard);
            });
        }
    </script>
<!-- Footer -->
<div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>
</html>
