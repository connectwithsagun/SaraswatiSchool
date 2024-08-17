<?php
$p = $_GET['p'];
if ($p == "news") {
    include 'view/news_listing.php';
} else if ($p == "newsDetails") {
    include 'view/news_details.php';
} else {
    include 'view/news_listing.php';
}
