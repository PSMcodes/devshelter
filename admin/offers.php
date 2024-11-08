<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the config file for the database connection
$servername = "localhost"; // Change this to your server name if different
$username = "u912243786_devshelter";        // Change this to your database username
$password = "5*?hu>lQ@zVg";            // Change this to your database password
$dbname = "u912243786_devshelter"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if there are any offers
function has_offer() {
    global $conn;

    // Query to count the number of offers
    $stmt = $conn->query("SELECT COUNT(id) AS offer_count FROM offers");

    if (!$stmt) {
        die("Query failed: " . $conn->error);
    }

    $result = $stmt->fetch_assoc();
    return intval($result['offer_count']) > 0;
}

// Function to display the latest offer
function display_latest_offer() {
    global $conn;

    // Query to get the latest offer
    $sql = "SELECT * FROM offers WHERE created_at <= NOW() AND NOW() <= expires_at ORDER BY created_at DESC LIMIT 1";
    $stmt = $conn->query($sql);

    if (!$stmt) {
        die("Query failed: " . $conn->error);
    }

    if ($stmt->num_rows > 0) {
        $result = $stmt->fetch_assoc();
        return "Use Code \"" . htmlspecialchars($result['coupon_code']) . "\" to get " . intval($result['discount_percentage']) . "% off on any Room booking.";
    }
}


?>
