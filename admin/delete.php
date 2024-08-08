<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id']) && isset($_GET['delete'])) {
        switch ($_GET['delete']) {
            case 'room_type':
                deleteRoomType($_GET['id']);
                break;
            case 'room':
                deleteRoom($_GET['id']);
                break;
            case 'booking':
                deleteBooking($_GET['id']);
                break;
            default:
                echo "Invalid operation.";
                break;
        }
    }
}


function deleteRoomType($room_id)
{
    global $conn;

    $sql = "DELETE FROM room_types WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return;
    }

    $stmt->bind_param("i", $room_id);

    if ($stmt->execute()) {
        echo "<script>alert('Room deleted successfully!')</script>";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header('Location: dashboard.php?page=manage_room_types');
    exit(); // Ensure the script stops execution after the redirect
}

function deleteRoom($room_id)
{
    global $conn;
    $sql = "DELETE FROM rooms WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $room_id);

    if ($stmt->execute()) {
        echo "Room deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header('Location: dashboard.php?page=manage_rooms');
    exit(); // Ensure the script stops execution after the redirect
}

function deleteBooking($bookingId)
{
    global $conn;
    $sql = "DELETE FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookingId);

    if ($stmt->execute()) {
        echo "Room deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header('Location: dashboard.php?page=manage_bookings');
    exit(); // Ensure the script stops execution after the redirect
}
?>