<?php
// manage_guests.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';

$guests = $conn->query("SELECT * FROM guests");
?>


    <h2 class="my-4">Guest List</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php while ($guest = $guests->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $guest['id']; ?></td>
            <td><?php echo $guest['name']; ?></td>
            <td><?php echo $guest['email']; ?></td>
            <td><?php echo $guest['phone']; ?></td>
        </tr>
        <?php } ?>
    </table>
