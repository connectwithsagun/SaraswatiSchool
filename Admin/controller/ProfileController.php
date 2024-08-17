<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "viewProfile") {
        include 'view/viewProfile.php';
        return;
    } else if ($_GET['a'] == "updateProfile") {
        if (empty($_POST)) {
            include 'view/updateProfile.php';
            return;
        }
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $phone = $_POST['mblno'];

        if ($pass != $cpass) {
            $error['body'] = 'Password Didnot Match';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=updateProfile");
            return;

        }
        $id = $_SESSION['admin']['user_id'];
        $pimg = $_SESSION['admin']['image'];
        if (isset($_FILES["img"])) {
            $filename = $_FILES['img']['name']; // filename along with extension
            $newFileName = date('y_m_d_h_i_s_') . $filename;
            $tmpname = $_FILES['img']['tmp_name'];
            $target = "resource/images/" . $newFileName;
            if (move_uploaded_file($tmpname, $target)) {

                if (file_exists($pimg)) {
                    @unlink($pimg);
                }
                $updatePP = update_profileImage($id, $target);
                if ($updatePP) {
                    unset($_SESSION['admin']['image']);
                    $_SESSION['admin']['image'] = $updatePP['image'];
                    $error['body'] = 'Profile Updated Successfully';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewProfile");
                    return;
                } else {
                    $error['body'] = 'Cannot Update Profile';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'warning';
                    setFlash('message', $error);
                    include 'view/updateProfile.php';
                    return;
                }
            } else {
                $error['body'] = 'Please Choose Image';
                $error['title'] = 'Info: ';
                $error['type'] = 'warning';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=updateProfile");
                return;
            }
        } else {
            $error['body'] = 'Please Choose Image Also';
            $error['title'] = 'Info: ';
            $error['type'] = 'warning';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=updateProfile");
            return;

        }
    } else if ($_GET['a'] == "viewProfile") {
        include 'view/viewProfile.php';
        return;
    }

} else {
    include 'view/viewProfile.php';
    return;

}
ob_end_flush();

/*
try {
$uid = $_SESSION['admin']['user_id'];
$target = "";
echo $uid;
die();
if (isset($_FILES["image"])) {
$target = "resource/images/" . basename($_FILES['image']['name']);
echo $target;
die();
move_uploaded_file($_FILES['image']['tmp_name'], $target);
$updatePP = update_profileImage($id, $target);
if ($updatePP) {
unset($_SESSION['admin']['image']);
$_SESSION['admin']['image'] = $updatePP['image'];
} else {
echo "error";
}
}
} catch (Exception $ex) {
// throwError();
}

try {
$flag = empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['address']) || empty($_POST['phone']);

//validate user inputdata
if ($flag) {
$error['body'] = 'All input field are required.';
$error['title'] = 'Danger!!';
$error['type'] = 'danger';
setFlash('message', $error);
include 'view/signup.php';
return;
}
//checking minimum length of password.
$password = filterText($_POST['password']);
if (strlen($password) < 7) {
$error['body'] = 'Password minimum length is 7.';
$error['title'] = 'Danger!!';
$error['type'] = 'danger';
setFlash('message', $error);
include 'view/signup.php';
return;
}

//checking if email already exists.
$email = filterText($_POST['email']);
$valudate = find_user_by_email($email);
if ($valudate) {
$error['body'] = 'Email already taken.';
$error['title'] = 'Danger!!';
$error['type'] = 'danger';
setFlash('message', $error);
include 'view/signup.php';
return;
}

$name = filterText($_POST['name']);
$address = filterText($_POST['address']);
$phone = filterText($_POST['phone']);
$target = "";
if (!empty($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
$target = "images/" . basename($_FILES['fileToUpload']['name']);
//  echo $target;
//die();
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
}

$user = signup_new_user($name, $email, $password, $address, $phone, $target, time());
if ($user) {
$msg['title'] = 'Success!!';
$msg['body'] = "You have successfully signup.";
$msg['type'] = 'success';
setFlash('message', $msg);
header("location:" . $base_url . "?r=login");
} else {
throwError(500, 'Unable to complete your request.');
}
} catch (Exception $ex) {
throwError();
}

}

 */