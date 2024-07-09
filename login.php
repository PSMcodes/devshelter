<?php
session_start();

$admin_user = 'admin';
$admin_pass = 'password123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $admin_user && $password == $admin_pass) {
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
    } else {
        echo 'Invalid username or password';
    }
}
?>
