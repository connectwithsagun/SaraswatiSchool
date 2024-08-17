<?php
$url = $_SERVER["REQUEST_URI"];

switch ($url) {
    case '/SaraswatiSchool/en':
        header('location:' . $url . "en");
        break;
    case '/SaraswatiSchool/np':
        header('location:' . $url . "np");

        break;
    default:
        header('location:' . $url . "en");
        break;
}
