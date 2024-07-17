<?php
// manage_locations.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    $sql = "INSERT INTO locations (name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        echo "Location added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$result = $conn->query("SELECT * FROM locations");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Locations</title>
</head>
<body>
    <h1>Manage Locations</h1>
    <form method="POST" action="manage_locations.php">
        <input type="text" name="name" placeholder="Location Name" class="form-control w-25 d-inline" required>
        <button type="submit" class="btn btn-primary">Add Location</button>
    </form>

    <h2>Location List</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
