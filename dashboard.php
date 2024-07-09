<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="dashboard-container">
        <h2>Admin Dashboard</h2>
        <button onclick="showAddOfferForm()">Add Offer</button>
        <button onclick="blockInventory()">Block Inventory</button>

        <div id="add-offer-form" style="display:none;">
            <h3>Add Offer</h3>
            <form action="add_offer.php" method="post">
                <label for="offer">Offer Details:</label>
                <input type="text" id="offer" name="offer" required>
                <button type="submit">Add Offer</button>
            </form>
        </div>

        <div id="block-inventory" style="display:none;">
            <h3>All rooms are booked</h3>
            <p>All inventory has been blocked.</p>
        </div>

        <h3>Current Offers</h3>
        <div id="offers">
        <?php include 'offers.php'; display_offers(); ?>
        </div>
    </div>

    <script>
        function showAddOfferForm() {
            document.getElementById('add-offer-form').style.display = 'block';
        }

        function blockInventory() {
            document.getElementById('block-inventory').style.display = 'block';
        }
    </script>
</body>

</html>
