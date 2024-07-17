<?php
// manage_rooms.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_number = $_POST['room_number'];
    $location_id = $_POST['location_id'];
    $type_id = $_POST['type_id'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "INSERT INTO rooms (room_number, location_id, type_id, price, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siids", $room_number, $location_id, $type_id, $price, $status);

    if ($stmt->execute()) {
        echo "Room added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$locations = $conn->query("SELECT * FROM locations");
$room_types = $conn->query("SELECT * FROM room_types");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Rooms</title>
</head>
<body>
    <h1>Manage Rooms</h1>
    <form method="POST" action="manage_rooms.php">
        <input class="form-control w-25 d-inline" type="text" name="room_number" placeholder="Room Number" required>
        <select class="form-select w-25 d-inline" name="location_id">
            <option value="" hidden>Location</option>
            <?php while ($location = $locations->fetch_assoc()) { ?>
                <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
            <?php } ?>
        </select>
        <select class="form-select w-25 d-inline" name="type_id">
        <option value="" hidden>Room Type</option>
            <?php while ($type = $room_types->fetch_assoc()) { ?>
                <option value="<?php echo $type['id']; ?>"><?php echo $type['type']; ?></option>
            <?php } ?>
        </select>
        <input class="form-control w-25 d-inline" type="number" step="0.01" name="price" placeholder="Price" required>
        <select class="form-select w-25 d-inline" name="status">
            <option value="" hidden>Status</option>
            <option value="available">Available</option>
            <option value="booked">Booked</option>
            <option value="maintenance">Maintenance</option>
        </select>
        <button type="submit" class="btn btn-primary">Add Room</button>
    </form>

    <h2>Room List</h2>
    <table class="table">
        <tr>
            <th>Room Number</th>
            <th>Location</th>
            <th>Type</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php
        $rooms = $conn->query("SELECT rooms.*, locations.name as location_name, room_types.type as room_type 
                               FROM rooms 
                               JOIN locations ON rooms.location_id = locations.id 
                               JOIN room_types ON rooms.type_id = room_types.id");
        while ($row = $rooms->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['room_number']; ?></td>
                <td><?php echo $row['location_name']; ?></td>
                <td><?php echo $row['room_type']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <?php if($row['status']=='available'){
                        echo '<span class="badge bg-success">'.$row['status'].'</span></td>';
                    }else if($row['status']=='booked'){
                        echo '<span class="badge text-bg-info">'.$row['status'].'</span></td>';
                    }else if($row['status']=='maintenance'){
                        echo '<span class="badge text-bg-warning">'.$row['status'].'</span></td>';
                    }
                    ?>
                <td>
                    <a href='edit_room.php?id=<?php echo $row['id']; ?>'>Edit</a> | 
                    <a href='delete_room.php?id=<?php echo $row['id']; ?>'>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
