<?php
ob_start();

if (isset($_GET['a'])) {
if ($_GET['a'] == "editContact") {
    
    if (empty($_POST)) {
        include 'view/editContact.php'; 
        return;
    }

    $cid = $_GET['id'];
    $Email = filterText($_POST['email']);
    $Phone = filterText($_POST['phone']);
    $Address = filterText($_POST['address']);

    $editContact = editContact($cid, $Email, $Phone, $Address);
    if ($editContact) {
        $error['body'] = 'Contact Updated';
        $error['title'] = 'Info: ';
        $error['type'] = 'success';
        setFlash('message', $error);
        header("location: $base_url?p=home&a=home");
    } else {
        $error['body'] = 'Unable to Update Contact';
        $error['title'] = 'Info: ';
        $error['type'] = 'danger';
        setFlash('message', $error);
        header("location: $base_url?p=home&a=home");

    }
}
}
ob_end_flush();





?>