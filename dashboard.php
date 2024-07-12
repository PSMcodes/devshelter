<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
<<<<<<< HEAD
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
=======
    header('Location: admin.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

>>>>>>> 17887e6e66d477bc331561e4160d578310122a6a
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
<<<<<<< HEAD
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
    </div>

=======
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Admin Dashboard</h2>
        <div class="mb-3">
            <button class="btn btn-primary" onclick="showAddOfferForm()">Add Offer</button>
            <button class="btn btn-danger ml-2" onclick="removeCurrentOffer()">Remove Current Offer</button>
            <select id="property-select" class="form-control d-inline-block w-auto ml-2">
                <option value="All Property">All Property</option>
                <option value="Malad">Malad</option>
                <option value="Jogeshwari">Jogeshwari</option>
                <option value="Goregaon">Goregaon</option>
            </select>
            <button class="btn btn-warning ml-2" onclick="toggleInventoryStatus()">Block/Unblock Selected
                Property</button>
            <!-- Logout Button -->
            <form action="logout.php" method="post" class="d-inline ml-2">
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
        </div>

        <div id="add-offer-form" class="card p-3 mb-4" style="display:none;">
            <h3>Add Offer</h3>
            <form action="add_offer.php" method="post">
                <div class="form-group">
                    <label for="offer">Offer Details:</label>
                    <input type="text" id="offer" name="offer" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Add Offer</button>
            </form>
        </div>

        <form id="block-inventory-form" action="block_inventory.php" method="post" style="display:none;">
            <input type="hidden" id="property" name="property">
            <input type="hidden" id="status" name="status">
        </form>

        <form id="remove-offer-form" action="remove_offer.php" method="post" style="display:none;">
            <input type="hidden" name="remove" value="1">
        </form>

        <?php
        include 'offers.php';
        $has_offer = has_offer();
        $any_blocked = any_property_blocked();
        ?>

        <div class="card p-3 mb-4">
            <h3>Current Offers</h3>
            <?php if ($has_offer) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Time</th>
                            <th scope="col">Offer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php display_offers(); ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No current offers.</p>
            <?php } ?>
        </div>

        <div class="card p-3 mb-4">
            <h3>Inventory Status</h3>
            <?php if ($any_blocked) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Property</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php display_any_blocked_property(); ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>All properties are available.</p>
            <?php } ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

>>>>>>> 17887e6e66d477bc331561e4160d578310122a6a
    <script>
        function showAddOfferForm() {
            document.getElementById('add-offer-form').style.display = 'block';
        }

<<<<<<< HEAD
        function blockInventory() {
            document.getElementById('block-inventory').style.display = 'block';
        }
    </script>
</body>
</html>
=======
        function toggleInventoryStatus() {
            var form = document.getElementById('block-inventory-form');
            var propertySelect = document.getElementById('property-select');
            var propertyInput = document.getElementById('property');
            var statusInput = document.getElementById('status');

            propertyInput.value = propertySelect.value;
            statusInput.value = (statusInput.value === 'blocked') ? 'available' : 'blocked';
            form.submit();
        }

        function removeCurrentOffer() {
            document.getElementById('remove-offer-form').submit();
        }
    </script>
</body>

</html>
>>>>>>> 17887e6e66d477bc331561e4160d578310122a6a
