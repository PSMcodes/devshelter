<?php
$servername = "localhost"; // Change this to your server name if different
$username = "u912243786_devshelter";        // Change this to your database username
$password = "5*?hu>lQ@zVg";            // Change this to your database password
$dbname = "u912243786_devshelter"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
