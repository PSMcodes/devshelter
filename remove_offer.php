<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.html');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (file_exists('offers.txt')) {
        $offers = file('offers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_pop($offers); // Remove the latest offer
        file_put_contents('offers.txt', implode("\n", $offers));
    }
    header('Location: dashboard.php');
    exit;
} else {
    echo 'Method Not Allowed';
}
?>
