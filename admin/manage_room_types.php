<?php
// manage_room_types.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $description = $_POST['description'];

    $sql = "INSERT INTO room_types (type, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $type, $description);

    if ($stmt->execute()) {
        echo "Room type added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$result = $conn->query("SELECT * FROM room_types");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Room Types</title>
</head>
<body>
    <h1>Manage Room Types</h1>
    <main class="d-flex">

        <form method="POST" action="manage_room_types.php" class="my-5 w-50">
            <input type="text" name="type" placeholder="Room Type" class="form-control d-inline w-75 m-2" required>
        <textarea name="description" placeholder="Description" class="form-control w-75 m-2" rows="5"  required></textarea>
        <button type="submit" class="btn btn-primary m-2">Add Room Type</button>
    </form>

    <!-- <h2>Room Type List</h2> -->
    <table class="table my-4 w-50">
        <tr class="table-dark">
            <th>ID</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['description']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>
