<?php
// manage_room_types.php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_id = $_POST['room_id'] ?? null; // Fetch room_id if available
    $type = $_POST['type'];
    $description = $_POST['description'];

    if ($room_id) {
        $sql = "UPDATE room_types SET type=?,description=? where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $type, $description, $room_id);
    } else {
        $sql = "INSERT INTO room_types (type, description) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $type, $description);

    }

    if ($room_id && $_POST['delete']) {
        $sql = "DELETE FROM room_type WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $room_id);

        if ($stmt->execute()) {
            echo "Room deleted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    if ($stmt->execute()) {
        echo "Room type added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    header("Location: dashboard.php?page=manage_room_types");
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
    <main>

        <form method="POST" action="manage_room_types.php" class="my-5 w-50">
            <input type="text" name="type" placeholder="Room Type" class="form-control d-inline w-75 m-2" required>
            <textarea name="description" placeholder="Description" class="form-control w-75 m-2" rows="5"
                required></textarea>
            <button type="submit" class="btn btn-primary m-2">Add Room Type</button>
        </form>

        <!-- <h2>Room Type List</h2> -->
        <table class="table my-4 ">
            <tr class="table-dark">
                <th>ID</th>
                <th>Type</th>
                <th>Description</th>
                <th>Functions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['type']; ?>
                </td>
                <td>
                    <?php echo $row['description']; ?>
                </td>
                <td>
                    <a class="btn btn-primary edit-room_type" data-bs-toggle="modal" data-bs-target="#myModal2"
                        data-room-type="<?php echo $row['type']; ?>" data-bs-id="<?php echo $row['id']; ?>"
                        data-room-description="<?php echo $row['description']; ?>">Edit
                    </a>
                    <a class="btn btn-danger" href="delete.php?delete=room_type&id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- Edit Room Modal -->
        <div class="modal" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Room</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editRoomTypeModal" method="POST" action="manage_room_types.php"
                            enctype="multipart/form-data">
                            <input type="text" name="room_id" id="" hidden>
                            <input type="text" name="type" placeholder="Room Type"
                                class="form-control d-inline w-75 m-2" required>
                            <textarea name="description" placeholder="Description" class="form-control w-75 m-2"
                                rows="5" required></textarea>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var editLinks = document.querySelectorAll('.edit-room_type');
        editLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                let room_type = this.getAttribute('data-room-type')
                let room_description = this.getAttribute('data-room-description')
                document.querySelector('#editRoomTypeModal input[name="type"]').value =
                    room_type;
                document.querySelector('#editRoomTypeModal input[name="room_id"]').value = this
                    .getAttribute('data-bs-id')
                document.querySelector('#editRoomTypeModal textarea[name="description"]')
                    .value = room_description;
            });
        });
    });
    </script>
</body>

</html>