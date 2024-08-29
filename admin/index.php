<?php
session_start();

// Redirect to dashboard if the user is already logged in
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION['user_id'])) {
    header("Location: dashboard.php?page=manage_rooms");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $fetched_username, $hashed_password, $role);
        $stmt->fetch();

        // Verify the password using password_verify
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $fetched_username;
            $_SESSION['role'] = $role;

            // Redirect to the dashboard
            header("Location: dashboard.php?page=manage_rooms");
            exit;
        } else {
            $error = "Invalid username or password"; // Incorrect password
        }
    } else {
        $error = "Invalid username or password"; // Username not found
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 bg-light">
        <h1 class="card-title text-center">Login</h1>
        <form method="POST" action="index.php" class="d-flex flex-column">
            <input type="text" name="username" placeholder="Username" required class="form-control my-2">
            <input type="password" name="password" placeholder="Password" required class="form-control my-2">
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="text-danger mt-3"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
