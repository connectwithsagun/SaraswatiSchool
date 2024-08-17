<?php
include 'helper/FlashMessageHelper.php';


if (empty($_POST)) {
    include 'view/login.php';
    return;
}

try {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error['body'] = 'Email and password are required.';
        $error['title'] = 'Info: ';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/login.php';
        return;
    }
    $username = $_POST['email'];
    $password = sha1($_POST['password']);
   
 
    $user = admin_login($username, $password);
    if ($user) {
        $checkstatus=checkstatus($username);
        if($checkstatus['status']=="1"){
            $_SESSION['admin']['login'] = true;
            $_SESSION['admin']['user_id'] = $user['userID'];
            $_SESSION['admin']['user_name'] = $user['username'];
            $_SESSION['admin']['name'] = $user['name'];
            $_SESSION['admin']['type'] = $user['uType'];
            $_SESSION['admin']['email'] = $user['email'];
            $_SESSION['admin']['phone'] = $user['mobileno'];
            $_SESSION['admin']['image'] = $user['image'];
            $error['body'] = 'logged in successfully !';
            $error['title'] = 'Info: ';
            $error['type'] = 'info';
            setFlash('message', $error);
            header("location:" . $base_url . "?p=home");
        }
        else{
            $error['body'] = 'Your account is in inactive.';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            include 'view/login.php';
            return;
        }
    } else {
        $error['body'] = 'No user found with given email and password.';
        $error['title'] = 'Info: ';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/login.php';
        return;
    }
} catch (Exception $ex) {
    include 'controller/ErrorController.php';
}