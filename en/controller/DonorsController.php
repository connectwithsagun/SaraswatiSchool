<?php
$p = $_GET['p'];
if ($p == "TodayDonors") {
    include 'view/TodayDonors.php';

} else {
    include 'view/donors.php';
}