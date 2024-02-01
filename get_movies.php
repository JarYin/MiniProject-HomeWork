<?php
// Simulated data, you should fetch data from your database
$movies = [
    ["Title" => "The Lion King", "Description" => "An animated classic about the circle of life.", "PosterURL" => "lion_king_poster.jpg"],
    ["Title" => "Toy Story", "Description" => "A story about toys coming to life.", "PosterURL" => "toy_story_poster.jpg"],
    // Add more movies as needed
];

// Convert PHP array to JSON and send it to the frontend
echo json_encode($movies);
?>
