<?php
if (empty($_POST)) {
    include 'view/contact.php';
    // include 'view/maps.php';

} else {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['message'];
    $contact = contact_us($name, $email, $phone, $msg);
    if ($contact) {
        echo "<script>alert('Message successfully sent');</script>";

    } else {
        echo "<script>alert('can not complete your request');</script>";

    }

}