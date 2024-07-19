<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// echo "Welcome, user ID: " . $_SESSION['user_id'] . " (Role: " . $_SESSION['role'] . ")";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row h-100">
            <!-- Vertical Navigation Bar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar py-5">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="navbar-brand">
                            <h1 class="h2 text-white text-center">Dashboard</h1>
                        </li>
                        <li class="navbar-brand bg-white ">
                            <img src="../img/main/logo.png" alt="img\main\logo.png"
                                class="navbar-logo w-100 d-block mx-auto">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-decoration-none active" aria-current="page"
                                href="dashboard.php?page=manage_locations">
                                Manage Locations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-decoration-none"
                                href="dashboard.php?page=manage_room_types">
                                Manage Room Types
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-decoration-none" href="dashboard.php?page=manage_rooms">
                                Manage Rooms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-decoration-none"
                                href="dashboard.php?page=manage_bookings">
                                Manage Bookings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-decoration-none" href="dashboard.php?page=manage_guest">
                                Manage Guests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger d-block mx-auto" href="logout.php">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                </div>
                <main id="view-panel">
                    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
                    <?php include $page . '.php' ?>
                </main>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>