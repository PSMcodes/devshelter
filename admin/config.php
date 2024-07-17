<?php
$servername = "localhost"; // Change this to your server name if different
$username = "root";        // Change this to your database username
$password = "";            // Change this to your database password
$dbname = "hotel_management"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
