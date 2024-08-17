<?php
if (!isset($_SESSION['admin']['login'])) {
    // $_SESSION['back_url'] = $_SERVER['HTTP_REFERER'];
    header("location:" . $base_url . "?p=login");
    return;
}