<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "addMember") {
        if (empty($_POST)) {
            include 'view/addMember.php'; 
            return;
        }

        $Mname = filterText($_POST['name']);
        $Pos = filterText($_POST['position']);

        $target = "";
        if (!empty($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $filename = $_FILES['fileToUpload']['name']; // filename along with extension
            $newFileName = date('y_m_d_h_i_s_') . $filename;
            $tmpname = $_FILES['fileToUpload']['tmp_name'];
            $target = "resource/images/" . $newFileName;

            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
        }

        $addnewnews = add_new_member($Mname, $Pos, $target);
        if ($addnewnews) {
            $msg['title'] = 'Success!!';
            $msg['body'] = "successfully added member";
            $msg['type'] = 'success';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=viewMember");
            return;
        } else {
            $msg['title'] = 'Info!!';
            $msg['body'] = "Cannot added member";
            $msg['type'] = 'danger';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=addMember");
            return;

        }
    }

    if ($_GET['a'] == "viewMember") {
        if (isset($_GET['id'])) { 
            $mid = $_GET['id'];
            $type = $_GET['type'];
            if ($type == 1 or $type == 0) {
                $changeMemberStatus = changeMemberStatus($mid, $type);
                if ($changeMemberStatus) {
                    $error['body'] = 'Member status Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewMember");

                } else {
                    $error['body'] = 'Unable to Change Member Status';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewMember"); 
                }
            } else {

            }

        }
 
        include 'view/viewMember.php';
    }

    if ($_GET['a'] == "deleteMember") {

        if (isset($_GET['id'])) {
            $mid = $_GET['id'];
            $img = $_GET['img'];
            $deleteMemberPhoto = deleteMemberPhoto($mid);
            if ($deleteMemberPhoto) {
                if (file_exists($img)) {
                    unlink($img);
                }
                $error['body'] = 'Member Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewMember");
            } else {
                $error['body'] = 'Unable to Delete Member';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewMember");

            }
        } else {

        }
        include 'view/viewMember.php';
    } 

    if ($_GET['a'] == "editMember") {
        if (empty($_POST)) { 
            include 'view/editMember.php';
            return;
        }
        $mid = $_GET['id'];
        $mname = filterText($_POST['memberName']);      
        $mpos = filterText($_POST['memberPosition']);
        
       

    
        $editMember = editMember($mid, $mname, $mpos);
        if ($editMember) {
            $error['body'] = 'Member Details Updated'; 
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewMember");
        } else {
            $error['body'] = 'Unable to Update Member Details';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewMember");

        }
    }

}
ob_end_flush();