<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';

// Handle offer deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM offers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $delete_id);
        $stmt->execute();
        echo "Offer deleted successfully!";
    } else {
        echo "Error deleting offer: " . $conn->error;
    }
    header('Location:dashboard.php?page=manage_offers');
    $stmt.close();
}

// Handle form submission for adding new offers
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $coupon_code = $_POST['coupon_code'];
    $discount_percentage = $_POST['discount_percentage'];
    $is_always_active = isset($_POST['is_always_active']) ? 1 : 0;

    if ($is_always_active) {
        $expires_at = null; // No expiry for always active offers
    } else {
        // Offer will expire after 24 hours
        $expires_at = date('Y-m-d H:i:s', strtotime('+24 hours'));
    }

    // Insert offer into the database
    $sql = "INSERT INTO offers (coupon_code, discount_percentage, is_always_active, expires_at) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("siis", $coupon_code, $discount_percentage, $is_always_active, $expires_at);
        $stmt->execute();
        echo "Offer added successfully!";
    } else {
        echo "Error adding offer: " . $conn->error;
    header('Location:dashboard.php?page=manage_offers');
}
}

// Fetch all offers from the database
$sql = "SELECT * FROM offers";
$offer_result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Offers</title>
</head>
<body>
    <h1>Add New Offer</h1>
    <form method="post">
        <label>Coupon Code:</label>
        <input type="text" name="coupon_code" required class="form-control"><br><br>

        <label>Discount Percentage:</label>
        <input type="number" name="discount_percentage" required class="form-control"><br><br>

        <label>Always Active:</label>
        <input type="checkbox" name="is_always_active" class=""form-control><br><br>

        <button type="submit" class="btn btn-primary">Add Offer</button>
    </form>

    <h1>All Offers</h1>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Coupon Code</th>
                <th>Discount (%)</th>
                <th>Is Always Active</th>
                <th>Expires At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $offer_result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['coupon_code']; ?></td>
                    <td><?php echo $row['discount_percentage']; ?>%</td>
                    <td><?php echo $row['is_always_active'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $row['expires_at'] ? $row['expires_at'] : 'N/A'; ?></td>
                    <td>
                        <a href="delete.php?delete=offer&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this offer?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
