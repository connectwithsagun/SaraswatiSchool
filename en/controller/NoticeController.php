<?php
$p = $_GET['p'];
if ($p == "notice") {
    include 'view/notice_listing.php';
} else if ($p == "noticeDetails") {
    include 'view/notice_details.php';
} else {
    include 'view/notice_listing.php';
}
