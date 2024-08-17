<?php

if (!function_exists("setFlash")) {

    function setFlash($key, $value)
    {
        $_SESSION[$key][] = $value;
    }

}

if (!function_exists("getFlash")) {

    function getFlash($key)
    {
        $flash = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $flash;
    }

}

if (!function_exists("hasFlash")) {

    function hasFlash($key)
    {
        return !empty($_SESSION[$key]);
    }

}

if (!function_exists("filterText")) {

    function filterText($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}