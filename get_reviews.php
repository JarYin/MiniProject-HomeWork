<?php
// Simulated data, you should fetch data from your database
$reviews = [
    ["Title" => "Amazing Movie!", "Content" => "I loved this movie. The characters were great, and the storyline was engaging.", "Author" => "John Doe", "Date" => "2022-02-10"],
    ["Title" => "Must-See!", "Content" => "Toy Story is a classic. I've watched it multiple times, and it never gets old.", "Author" => "Jane Smith", "Date" => "2022-02-12"],
    // Add more reviews as needed
];

// Convert PHP array to JSON and send it to the frontend
echo json_encode($reviews);
?>
