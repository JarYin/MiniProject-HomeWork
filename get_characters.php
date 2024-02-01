<?php
// Simulated data, you should fetch data from your database
$characters = [
    ["Name" => "Simba", "Description" => "The main character in The Lion King.", "ImageURL" => "simba.jpg"],
    ["Name" => "Woody", "Description" => "The cowboy doll in Toy Story.", "ImageURL" => "woody.jpg"],
    // Add more characters as needed
];

// Convert PHP array to JSON and send it to the frontend
echo json_encode($characters);
?>
