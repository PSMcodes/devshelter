<?php
include 'config.php';

function has_offer()
{
    global $conn;
    $stmt = $conn->query("SELECT count(id) FROM offers");
    if (intval($stmt->fetch_assoc()) > 0) {
        return true;
    } else {
        echo false;
    }
}

function display_latest_offer()
{   
    global $conn;
    $sql = "SELECT * FROM `offers` WHERE created_at <= NOW() AND NOW() >= expires_at;";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch_assoc();
    $str = "Use Code \"".$result['coupon_code']."\" to get ".$result['discount_percentage']."% off on any Room booking.";
    return $str;
}
?>