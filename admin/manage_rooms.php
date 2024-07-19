<?php
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

// For edit purpose
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_id = $_POST['room_id'] ?? null; // Fetch room_id if available
    $room_number = $_POST['room_number'];
    $location_id = $_POST['location_id'];
    $type_id = $_POST['type_id'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    if ($room_id) {
        // Update existing room
        $sql = "UPDATE rooms SET room_number=?, location_id=?, type_id=?, price=?, status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siidsi", $room_number, $location_id, $type_id, $price, $status, $room_id);
        echo 'room updated';
    } else {
        // Insert new room
        $sql = "INSERT INTO rooms (room_number, location_id, type_id, price, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siids", $room_number, $location_id, $type_id, $price, $status);
    }

    if ($stmt->execute()) {
        echo "<br>Room saved successfully! 222";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$locations_array = [];
$room_types_array = [];

$locations_result = $conn->query("SELECT * FROM locations");
while ($location = $locations_result->fetch_assoc()) {
    $locations_array[] = $location;
}

$room_types_result = $conn->query("SELECT * FROM room_types");
while ($type = $room_types_result->fetch_assoc()) {
    $room_types_array[] = $type;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Rooms</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Manage Rooms</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Room</button>
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
        $rooms = $conn->query("SELECT rooms.*, locations.name as location_name, room_types.type as room_type FROM rooms JOIN locations ON rooms.location_id = locations.id JOIN room_types ON rooms.type_id = room_types.id");
        while ($row = $rooms->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['room_number']; ?></td>
                <td><?php echo $row['location_name']; ?></td>
                <td><?php echo $row['room_type']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <?php if ($row['status'] == 'available') {
                        echo '<span class="badge bg-success">' . $row['status'] . '</span>';
                    } else if ($row['status'] == 'booked') {
                        echo '<span class="badge bg-info">' . $row['status'] . '</span>';
                    } else if ($row['status'] == 'maintenance') {
                        echo '<span class="badge bg-warning">' . $row['status'] . '</span>';
                    } ?>
                </td>
                <td>
                    <a href='#' class='edit-room' data-id='<?php echo $row['id']; ?>'
                        data-room-number='<?php echo $row['room_number']; ?>'
                        data-location-id='<?php echo $row['location_id']; ?>' data-type-id='<?php echo $row['type_id']; ?>'
                        data-price='<?php echo $row['price']; ?>' data-status='<?php echo $row['status']; ?>'
                        data-bs-toggle="modal" data-bs-target="#myModal1">Edit</a> |
                    <a href='delete_room.php?id=<?php echo $row['id']; ?>'>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- Add Room Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Room</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="manage_rooms.php">
                    <input class="form-control my-2 d-inline" type="text" name="room_number" placeholder="Room Number" required>
                    <select class="form-select my-2 d-inline" name="location_id">
                        <option value="" hidden>Location</option>
                        <?php foreach ($locations_array as $location) { ?>
                            <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                        <?php } ?>
                    </select>
                    <select class="form-select my-2 d-inline" name="type_id">
                        <option value="" hidden>Room Type</option>
                        <?php foreach ($room_types_array as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['type']; ?></option>
                        <?php } ?>
                    </select>
                    <input class="form-control my-2 d-inline" type="number" step="0.01" name="price" placeholder="Price" required>
                    <select class="form-select my-2 d-inline" name="status">
                        <option value="" hidden>Status</option>
                        <option value="available">Available</option>
                        <option value="booked">Booked</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Room Modal -->
<div class="modal" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Room</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editRoomModal" method="POST" action="manage_rooms.php">
                    <input type="hidden" name="room_id" value="">
                    <input class="form-control my-2 d-inline" type="text" name="room_number" placeholder="Room Number" required>
                    <select class="form-select my-2 d-inline" name="location_id">
                        <option value="" hidden>Location</option>
                        <?php foreach ($locations_array as $location) { ?>
                            <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                        <?php } ?>
                    </select>
                    <select class="form-select my-2 d-inline" name="type_id">
                        <option value="" hidden>Room Type</option>
                        <?php foreach ($room_types_array as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['type']; ?></option>
                        <?php } ?>
                    </select>
                    <input class="form-control my-2 d-inline" type="number" step="0.01" name="price" placeholder="Price" required>
                    <select class="form-select my-2 d-inline" name="status">
                        <option value="" hidden>Status</option>
                        <option value="available">Available</option>
                        <option value="booked">Booked</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- Script to handle edit room modal -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var editLinks = document.querySelectorAll('.edit-room');
    editLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            var roomId = this.getAttribute('data-id');
            var roomNumber = this.getAttribute('data-room-number');
            var locationId = this.getAttribute('data-location-id');
            var typeId = this.getAttribute('data-type-id');
            var price = this.getAttribute('data-price');
            var status = this.getAttribute('data-status');

            document.querySelector('#editRoomModal input[name="room_number"]').value = roomNumber;
            document.querySelector('#editRoomModal select[name="location_id"]').value = locationId;
            document.querySelector('#editRoomModal select[name="type_id"]').value = typeId;
            document.querySelector('#editRoomModal input[name="price"]').value = price;
            document.querySelector('#editRoomModal select[name="status"]').value = status;
            document.querySelector('#editRoomModal input[name="room_id"]').value = roomId;
        });
    });
});
</script>


    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Script to handle edit room modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var editLinks = document.querySelectorAll('.edit-room');
            editLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    var roomId = this.getAttribute('data-id');
                    var roomNumber = this.getAttribute('data-room-number');
                    var locationId = this.getAttribute('data-location-id');
                    var typeId = this.getAttribute('data-type-id');
                    var price = this.getAttribute('data-price');
                    var status = this.getAttribute('data-status');

                    document.querySelector('#editRoomModal input[name="room_number"]').value = roomNumber;
                    document.querySelector('#editRoomModal select[name="location_id"]').value = locationId;
                    document.querySelector('#editRoomModal select[name="type_id"]').value = typeId;
                    document.querySelector('#editRoomModal input[name="price"]').value = price;
                    document.querySelector('#editRoomModal select[name="status"]').value = status;
                    document.querySelector('#editRoomModal input[name="room_id"]').value = roomId;
                });
            });
        });
    </script>
</body>

</html>