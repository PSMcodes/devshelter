<?php
// manage_bookings.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';
require 'delete.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_id = $_POST['room_id'];
    $guest_id = $_POST['guest_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $status = $_POST['status'];
    $totalRooms = $_POST['totalRooms'];
    $totalGuest = $_POST['totalGuest'];

    // Add booking
    $sql_booking = "INSERT INTO `bookings` (`timestamp`, `room_id`, `guest_id`, `check_in`, `check_out`, `status`, `totalRooms`, `totalGuest`) VALUES (CURRENT_TIMESTAMP, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_booking = $conn->prepare($sql_booking);


    $stmt_booking->bind_param("iisssii", $room_id, $guest_id, $check_in, $check_out, $status, $totalRooms, $totalGuest);


    if ($stmt_booking->execute()) {
        echo "<script>alert('Booking added successfully!')</script>";
    } else {
        echo "Error: " . $stmt_booking->error;
    }




}

$rooms = $conn->query("SELECT * FROM rooms WHERE status = 'available'");
$guests = $conn->query("SELECT * FROM guests");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Bookings</title>
</head>

<body>
    <h1>Manage Bookings</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
        Book a Room
    </button>
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book a Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">

                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="room_id">Room ID</label>
                            <input list="room_id_list" class="form-control" id="room_id" name="room_id" required
                                placeholder="Room No">
                            <datalist id="room_id_list">
                                <?php while ($room = $rooms->fetch_assoc()) { ?>
                                <option value="<?php echo $room['id']; ?>">
                                    <?php echo $room['room_number']; ?>
                                </option>
                                <?php } ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="guest_id">Guest ID</label>
                            <input list="guest_id_list" class="form-control" id="guest_id" name="guest_id" required
                                placeholder="Guest">
                            <datalist id="guest_id_list">
                                <?php while ($guest = $guests->fetch_assoc()) { ?>
                                <option value="<?php echo $guest['id']; ?>">
                                    <?php echo $guest['name']; ?>
                                </option>
                                <?php } ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="check_in">Check-In Date</label>
                            <input type="date" class="form-control" id="check_in" name="check_in" required>
                        </div>
                        <div class="form-group">
                            <label for="check_out">Check-Out Date</label>
                            <input type="date" class="form-control" id="check_out" name="check_out" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="pending">Pending</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="totalRooms">Total Rooms</label>
                            <input type="number" class="form-control" id="totalRooms" name="totalRooms" required>
                        </div>
                        <div class="form-group">
                            <label for="totalGuest">Total Guests</label>
                            <input type="number" class="form-control" id="totalGuest" name="totalGuest" required>
                        </div>
                        <!-- Add timestamp and other hidden fields if needed -->
                        <input type="hidden" name="timestamp" value="<?php echo date('Y-m-d H:i:s'); ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2>Booking List</h2>
    <table class="table">
        <tr>
            <th>Room Number</th>
            <th>Guest Name</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php
        $bookings = $conn->query("SELECT bookings.*, rooms.room_number, guests.name as guest_name 
                                  FROM bookings 
                                  JOIN rooms ON bookings.room_id = rooms.id 
                                  JOIN guests ON bookings.guest_id = guests.id");
        while ($row = $bookings->fetch_assoc()) { ?>
        <tr>
            <td>
                <?php echo $row['room_number']; ?>
            </td>
            <td>
                <?php echo $row['guest_name']; ?>
            </td>
            <td>
                <?php echo $row['check_in']; ?>
            </td>
            <td>
                <?php echo $row['check_out']; ?>
            </td>
            <td>
                <?php echo $row['status']; ?>
            </td>
            <td>
                <a href='edit_booking.php?id=<?php echo $row['id']; ?>'>Edit</a> |
                <a href='delete_booking.php?id=<?php echo $row['id']; ?>'>Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>

</html>