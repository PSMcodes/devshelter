<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $offer = $_POST['offer'];
    
    // Sanitize input
    $offer = htmlspecialchars($offer, ENT_QUOTES, 'UTF-8');

    // Append the offer along with the current timestamp to the offers.txt file
    $timestamp = time();
    file_put_contents('offers.txt', $timestamp . '|' . $offer . PHP_EOL, FILE_APPEND | LOCK_EX);

    header('Location: dashboard.php');  // Redirect back to the dashboard after adding the offer
    exit();
} else {
    echo 'Method Not Allowed';
}
?>
    