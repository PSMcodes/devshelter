<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $offer = $_POST['offer'];

    // Sanitize input
    $offer = htmlspecialchars($offer, ENT_QUOTES, 'UTF-8');

    // Append the offer along with the current timestamp to the offers.txt file
    $timestamp = time();
    $formattedOffer = $timestamp . '|' . $offer . PHP_EOL;

    // Use FILE_APPEND flag to append to the file, and LOCK_EX to prevent race conditions
    file_put_contents('offers.txt', $formattedOffer, FILE_APPEND | LOCK_EX);

    // Redirect back to the dashboard after adding the offer
    header('Location: dashboard.php');
    exit();
} else {
    echo 'Method Not Allowed';
}
?>
