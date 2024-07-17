<?php
// manage_bookings.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_id = $_POST['room_id'];
    $guest_name = $_POST['guest_name'];
    $guest_email = $_POST['guest_email'];
    $guest_phone = $_POST['guest_phone'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $status = $_POST['status'];

    // Add guest
    $sql_guest = "INSERT INTO guests (name, email, phone) VALUES (?, ?, ?)";
    $stmt_guest = $conn->prepare($sql_guest);
    $stmt_guest->bind_param("sss", $guest_name, $guest_email, $guest_phone);

    if ($stmt_guest->execute()) {
        $guest_id = $stmt_guest->insert_id;

        // Add booking
        $sql_booking = "INSERT INTO bookings (room_id, guest_id, check_in, check_out, status) VALUES (?, ?, ?, ?, ?)";
        $stmt_booking = $conn->prepare($sql_booking);
        $stmt_booking->bind_param("iisss", $room_id, $guest_id, $check_in, $check_out, $status);

        if ($stmt_booking->execute()) {
            echo "Booking added successfully!";
        } else {
            echo "Error: " . $stmt_booking->error;
        }

        $stmt_booking->close();
    } else {
        echo "Error: " . $stmt_guest->error;
    }

    $stmt_guest->close();
}

$rooms = $conn->query("SELECT * FROM rooms WHERE status = 'available'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Bookings</title>
</head>
<body>
    <h1>Manage Bookings</h1>
    <form method="POST" action="manage_bookings.php">
        <select name="room_id" class="form-select w-25 d-inline m-2 ">
            <?php while ($room = $rooms->fetch_assoc()) { ?>
                <option value="<?php echo $room['id']; ?>"><?php echo $room['room_number']; ?></option>
            <?php } ?>
        </select>
        <input  class="form-control w-25 d-inline m-2 " type="text" name="guest_name" placeholder="Guest Name" required>
        <input  class="form-control w-25 d-inline m-2 " type="email" name="guest_email" placeholder="Guest Email" required>
        <input  class="form-control w-25 d-inline m-2 " type="tel" name="guest_phone" placeholder="Guest Phone" required>
        <input  class="form-control w-25 d-inline m-2 " type="date" name="check_in" required>
        <input  class="form-control w-25 d-inline m-2 " type="date" name="check_out" required>
        <select class="form-select w-25 d-inline m-2 "  name="status">
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="cancelled">Cancelled</option>
        </select>
        <button type="submit">Add Booking</button>
    </form>

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
                <td><?php echo $row['room_number']; ?></td>
                <td><?php echo $row['guest_name']; ?></td>
                <td><?php echo $row['check_in']; ?></td>
                <td><?php echo $row['check_out']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a href='edit_booking.php?id=<?php echo $row['id']; ?>'>Edit</a> | 
                    <a href='delete_booking.php?id=<?php echo $row['id']; ?>'>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
