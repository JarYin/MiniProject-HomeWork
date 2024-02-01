<?php
// Simulated data, you should fetch data from your database
$trailers = [
    ["Title" => "The Lion King Trailer", "Description" => "Official trailer for The Lion King.", "EmbedURL" => "https://www.youtube.com/embed/4CbLXeGSDxg"],
    ["Title" => "Toy Story Trailer", "Description" => "Official trailer for Toy Story.", "EmbedURL" => "https://www.youtube.com/embed/KYz2wyBy3kc"],
    // Add more trailers as needed
];

// Convert PHP array to JSON and send it to the frontend
echo json_encode($trailers);
?>
