<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_SESSION['user_id'])) {
        header("Location: dashboard.php?page=manage_rooms");
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user is found and verify the password
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();
        echo "Fetched Password: " . $password;
        $_SESSION['user_id'] = $id;
        $_SESSION['role'] = $role;
        header("Location: dashboard.php?page=manage_rooms");
        exit;
    } else {
        $error = "Invalid username or password";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body class="d-flex justify-content-center align-items-center flex-column p-5">
    <h1>Login</h1>
    <form method="POST" action="index.php" class="d-flex flex-column bg-light p-5 rounded ">
        <input type="text" name="username" placeholder="Username" required class="form-control my-2">
        <input type="password" name="password" placeholder="Password" required class="form-control my-2">
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>