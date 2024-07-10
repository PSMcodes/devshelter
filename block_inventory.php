<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $property = $_POST['property'];

    if (file_exists('inventory_status.txt')) {
        $lines = file('inventory_status.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $updated_lines = [];
        $found = false;

        foreach ($lines as $line) {
            list($prop, $status) = explode('|', $line);
            if ($prop == $property) {
                $new_status = ($status == 'blocked') ? 'available' : 'blocked';
                $updated_lines[] = $prop . '|' . $new_status;
                $found = true;
            } else {
                $updated_lines[] = $line;
            }
        }

        if (!$found) {
            $updated_lines[] = $property . '|blocked';
        }

        file_put_contents('inventory_status.txt', implode("\n", $updated_lines));
    } else {
        file_put_contents('inventory_status.txt', $property . '|blocked');
    }
}

header('Location: dashboard.php');
exit;
?>
