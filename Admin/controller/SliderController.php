<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "addSlider") {
        if (empty($_POST)) { 
            include 'view/addSlider.php';
            return;
        }
 
        $slidertitle = filterText($_POST['slidername']);
        $sliderdesc = filterText($_POST['description']); 

        $target = "";
        if (!empty($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $filename = $_FILES['fileToUpload']['name']; // filename along with extension
            $newFileName = date('y_m_d_h_i_s_') . $filename;
            $tmpname = $_FILES['fileToUpload']['tmp_name'];
            $target = "resource/images/" . $newFileName;

            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
        }

        $addnewSlider = addSlider($slidertitle, $sliderdesc, $target);
        if ($addnewSlider) {
            $msg['title'] = 'Success!!';
            $msg['body'] = "successfully added Slider";
            $msg['type'] = 'success';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=viewSlider");
            return;
        } else {
            $msg['title'] = 'Info!!';
            $msg['body'] = "Cannot added Slider";
            $msg['type'] = 'danger';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=addSlider");
            return;

        }
    } 
    if ($_GET['a'] == "viewSlider") {
        if (isset($_GET['id'])) {
            $sid = $_GET['id'];
            $type = $_GET['type'];
            if ($type == 1 or $type == 0) {
                $changeSliderStatus = changeSliderStatus($sid, $type);
                if ($changeSliderStatus) {
                    $error['body'] = 'Slider Status Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewSlider");

                } else {
                    $error['body'] = 'Unable to Change Slider Status';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewSlider");
                }
            } else {

            }

        }

        include 'view/viewSlider.php';
    }


if ($_GET['a'] == "editSlider") {
    if (empty($_POST)) {
        include 'view/editSlider.php';
        return;
    }
    $sid = $_GET['sliderTitle'];
    $stitle = filterText($_POST['sliderTitle']);
    $des = filterText($_POST['sliderDesc']);
        include 'view/editSlider.php';
        include 'view/editSlider.php';
    $editSlider = editSlider($sid, $stitle, $des);
    if ($editSlider) {
        $error['body'] = 'Slider Updated';
        $error['title'] = 'Info: ';
        $error['type'] = 'success';
        setFlash('message', $error);
        header("location: $base_url?p=home&a=viewSlider");
    } else {
        $error['body'] = 'Unable to Update Slider';
        $error['title'] = 'Info: ';
        $error['type'] = 'danger';
        setFlash('message', $error);
        header("location: $base_url?p=home&a=viewSlider");

    }
}

    if ($_GET['a'] == "deleteSlider") {

        if (isset($_GET['id'])) {
            $sid = $_GET['id'];
            $img = $_GET['img'];
            $deleteSliderPhoto = deleteSlider($sid);
            if ($deleteSliderPhoto) {
                if (file_exists($img)) {
                    unlink($img);
                }
                $error['body'] = 'Slider Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewSlider");
            } else {
                $error['body'] = 'Unavlr to Delete Slider';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewSlider");
            }
        } else {

        }
        include 'view/viewSlider.php';
    }
}

ob_end_flush();