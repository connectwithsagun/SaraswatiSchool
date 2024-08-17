<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "addNotices") {
        if (empty($_POST)) { 
            include 'view/addNotices.php';
            return;
        }

        $Nname = filterText($_POST['noticetitle']);
        $Des = filterText($_POST['description']);

        $target = "";
        if (!empty($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $filename = $_FILES['fileToUpload']['name']; // filename along with extension
            $newFileName = date('y_m_d_h_i_s_') . $filename;
            $tmpname = $_FILES['fileToUpload']['tmp_name'];
            $target = "resource/images/" . $newFileName;

            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
        }
        $target1 = "";
        if (!empty($_FILES["fileToUpload1"]) && $_FILES["fileToUpload1"]["error"] == 0) {
            $filename = $_FILES['fileToUpload1']['name']; // filename along with extension
            $newFileName = date('y_m_d_h_i_s_'). $filename;
            $tmpname = $_FILES['fileToUpload1']['tmp_name'];
            $target1 = "resource/files/" . $newFileName;

            move_uploaded_file($_FILES['fileToUpload1']['tmp_name'], $target1);
        }

        $addnewnotice = add_new_notice($Nname, $Des, $target , $target1);
        if ($addnewnotice) {
            $msg['title'] = 'Success!!';
            $msg['body'] = "successfully added notice";
            $msg['type'] = 'success';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=viewNotices");
            return;
        } else {
            $msg['title'] = 'Info!!';
            $msg['body'] = "Cannot added notice";
            $msg['type'] = 'danger';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=addNotices");
            return;

        }
    } 

    if ($_GET['a'] == "viewNotices") {

        if (isset($_GET['id'])) {
            $nid = $_GET['id'];
            $type = $_GET['type'];
            if ($type == 1 or $type == 0) {
                $changeNoticeStatus = changeNoticeStatus($nid, $type);
                if ($changeNoticeStatus) {
                    $error['body'] = 'Notice Status Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewNotices");

                } else {
                    $error['body'] = 'Unable to Change Notice Status';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewNotices");
                }
            } else {

            }

        }

        include 'view/viewNotice.php';
    }

    if ($_GET['a'] == "deleteNotices") {

        if (isset($_GET['id'])) {
            $nid = $_GET['id'];
            $img = $_GET['img'];
            $File=$_GET['File'];
            $deleteNoticePhoto = deleteNoticePhoto($nid);
            if ($deleteNoticePhoto) {
                if (file_exists($img)) {
                    unlink($img);
                }
                if (file_exists($File)) {
                    unlink($File);
                }
                $error['body'] = 'Notice Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewNotices");
            } else {
                $error['body'] = 'Unable to Delete Notice';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewNotices");

            }
        } else {

        }
        include 'view/viewNotice.php';
    }

    if ($_GET['a'] == "editNotices") {
        if (empty($_POST)) { 
            include 'view/editNotice.php';
            return;
        } 
        $nid = $_GET['id'];
        $ntitle = filterText($_POST['noticeTitle']);      
        $des = filterText($_POST['noticedesc']);
        
       

    
        $editNotice = editNotice($nid, $ntitle, $des);
        if ($editNotice) {
            $error['body'] = 'Notice Updated';
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewNotices");
        } else {
            $error['body'] = 'Unable to Update Notice';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewNotices");

        }
    }

}
ob_end_flush();