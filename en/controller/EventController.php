<?php
$p = $_GET['p'];
if ($p == "events") {
    include 'view/events_listing.php';
} else if ($p == "eventDetails") {
    include 'view/events_details.php';
} else {
    include 'view/events_listing.php';
}