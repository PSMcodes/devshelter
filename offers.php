<?php
function display_offers()
{
    if (file_exists('offers.txt')) {
        $offers = file('offers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($offers as $offer) {
            echo "<h3>$offer</h3>";
        }
    } else {
        echo "<p>No offers available.</p>";
    }
}


$has_offer = false;
function display_latest_offer()
{
    $offers = file('offers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $latest_offer_with_timestamp = end($offers);
    list($timestamp, $offer) = explode('|', $latest_offer_with_timestamp);
    $current_time = time();
    $time_difference = $current_time - $timestamp;

    // Check if the offer is within 24 hours (86400 seconds)
    if ($time_difference <= 86400) {
        $has_offer = true;
    }
    echo str_repeat("<li>$offer</li>", 10);

}
function has_offer()
{
    $offers = file('offers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (file_exists('offers.txt')) {
        if (!empty($offers)) {
            $latest_offer_with_timestamp = end($offers);
            list($timestamp, $offer) = explode('|', $latest_offer_with_timestamp);
            $current_time = time();
            $time_difference = $current_time - $timestamp;

            // Check if the offer is within 24 hours (86400 seconds)
            if ($time_difference <= 86400) {
                $has_offer = true;
            }
        }
    }
    return $has_offer;
}
?>