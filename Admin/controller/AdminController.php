<?php
ob_start();
include 'helper/FlashMessageHelper.php';

if (isset($_GET['a'])) {
    if ($_GET['a'] == "addAdmin") {
        if (empty($_POST)) {
            include 'view/addAdmin.php';
            return;
        }
        $name = filterText($_POST['name']);
        $username = filterText($_POST['username']);
        $email = $_POST['email'];
        $pass = filterText($_POST['pass']);
        $cpass = filterText($_POST['cpass']);
        $phone = filterText($_POST['mblno']);
        $type = $_POST['type'];
        if ($pass != $cpass) {
            $error['body'] = 'Password Didnot Match';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=addAdmin");
            return;
  
        }
        $npass = sha1($pass);
        $checkemail=checkemail($email);
       
        if(!$checkemail['email']){

        $addAdmin = add_admin($name, $username, $email, $npass, $phone, $type);
        if ($addAdmin) {
            $error['body'] = 'New admin successfully added!';
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewAdmin");
        }
        else {
            $error['body'] = 'Cannot add new admin';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=addAdmin");
    
        
        }
    
    } else {
        $error['body'] = 'Email is already taken';
        $error['title'] = 'Info: ';
        $error['type'] = 'danger';
        setFlash('message', $error);
        header("location: $base_url?p=home&a=addAdmin");
    }
        
   
}

    
    

    if ($_GET['a'] == "viewAdmin") { 
        if (isset($_GET['id'])) {
            $uid = $_GET['id'];
            $type = $_GET['type'];
            if ($type == 1 or $type == 0) {
                $changeAdminStatus = changeAdminStatus($uid, $type);
                if ($changeAdminStatus) {
                    $error['body'] = 'Admin Status Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewAdmin");
                } else {
//error
                }
            } else {
                $error['body'] = 'Admin Status Cannot Changed!';
                $error['title'] = 'Info: ';
                $error['type'] = 'warning';
                setFlash('message', $error);
            }

        }
        include 'view/viewAdmin.php';
    }
    if ($_GET['a'] == "deleteAdmin") {
        $uid = $_GET['id'];
        $pimg = $_GET['img'];

        $deleteAdmin = delete_admin($uid);
        if (file_exists($pimg)) {
            @unlink($pimg);
        }
        if ($deleteAdmin) {
            $error['body'] = 'Admin Deleted Successfully!';
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewAdmin");
        } else {
            echo " error";
            return;
        }
    }
}
ob_end_flush();