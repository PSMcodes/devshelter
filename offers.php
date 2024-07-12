<?php
function display_offers()
{
    if (file_exists('offers.txt')) {
        $offers = file('offers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($offers as $offer) {
            list($timestamp,$Curroffer) = explode('|',$offer);
            $date_time = date('d-m-y H:i:s', $timestamp);
            echo "<tr><td>$date_time</td><td> $Curroffer</tr>";
        }
    } else {
        echo "<p>No offers available.</p>";
    }
}

function has_offer()
{
    if (file_exists('offers.txt')) {
        $offers = file('offers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!empty($offers)) {
            $latest_offer_with_timestamp = end($offers);
            list($timestamp, $offer) = explode('|', $latest_offer_with_timestamp);
            $current_time = time();
            $time_difference = $current_time - $timestamp;

            // Check if the offer is within 24 hours (86400 seconds)
            return $time_difference <= 86400;
        }
    }
    return false;
}

function display_latest_offer()
{
    if (file_exists('offers.txt')) {
        $offers = file('offers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!empty($offers)) {
            $latest_offer_with_timestamp = end($offers);
            list($timestamp, $offer) = explode('|', $latest_offer_with_timestamp);
            $current_time = time();
            $time_difference = $current_time - $timestamp;

            // Check if the offer is within 24 hours (86400 seconds)
            if ($time_difference <= 86400) {
                // Display the offer multiple times for the marquee effect
                echo str_repeat("<li>$offer</li>", 10);
            }
        }
    }
}

function is_property_blocked($property)
{
    if (file_exists('inventory_status.txt')) {
        $lines = file('inventory_status.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($prop, $status) = explode('|', $line);
            if ($prop === $property) {
                return $status === 'blocked';
            }
        }
    }
    return false;
}

function display_inventory_status($property)
{
    if (is_property_blocked($property)) {
        echo "<li>All rooms in $property are booked</li>";
    }
}

function any_property_blocked()
{
    if (file_exists('inventory_status.txt')) {
        $lines = file('inventory_status.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($property, $status) = explode('|', $line);
            if ($status === 'blocked') {
                return true;
            }
        }
    }
    return false;
}

function display_any_blocked_property()
{
    if (file_exists('inventory_status.txt')) {
        $lines = file('inventory_status.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($property, $status) = explode('|', $line);
            if ($status === 'blocked') {
                echo "<tr><td>$property</td><td> All rooms are booked </td></tr>";
                break;
            }
        }
    }
}

?>
