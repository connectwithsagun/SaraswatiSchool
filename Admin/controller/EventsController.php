<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "addEvents") {
        if (empty($_POST)) {
            include 'view/addEvents.php';
            return;
        }

        $Ename = filterText($_POST['eventname']);
        $Des = $_POST['description'];

        $target = "";
        if (!empty($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $filename = $_FILES['fileToUpload']['name']; // filename along with extension
            $newFileName = date('y_m_d_h_i_s_') . $filename;
            $tmpname = $_FILES['fileToUpload']['tmp_name'];
            $target = "resource/images/" . $newFileName;

            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
        }

        $addnewevent = add_new_event($Ename, $Des, $target);
        if ($addnewevent) {
            $msg['title'] = 'Success!!';
            $msg['body'] = "successfully added event";
            $msg['type'] = 'success';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=viewEvents");
            return;
        } else {
            $msg['title'] = 'Info!!';
            $msg['body'] = "Cannot added event";
            $msg['type'] = 'danger';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=addEvents");
            return;

        }
    }

    if ($_GET['a'] == "viewEvents") {
        if (isset($_GET['id'])) { 
            $eid = $_GET['id'];
            $type = $_GET['type'];
            if ($type == 1 or $type == 0) {
                $changeEventStatus = changeEventStatus($eid, $type);
                if ($changeEventStatus) {
                    $error['body'] = 'Notice Status Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewEvents");

                } else {
                    $error['body'] = 'Unable to Change Event Status';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewEvents");
                }
            } else {

            }

        }

        include 'view/viewEvents.php';
    }

    if ($_GET['a'] == "deleteEvents") {

        if (isset($_GET['id'])) {
            $eid = $_GET['id'];
            $img = $_GET['img'];

            $getEventDescription = get_event_description($eid);
           
            $d =  $getEventDescription['description'];
            
            $dom = new DOMDocument;
            $dom->loadHTML($d);
            $count = $dom->getElementsByTagName('img')->length;
            
            $deleteEventPhoto = deleteEventPhoto($eid);
            if ($deleteEventPhoto) { 

                for($i=0;$i<$count;$i++){
                    $src = $dom->getElementsByTagName('img')[$i]->getAttribute('src');
                    $s = substr($src,22);
                    unlink($s);
                }   
                
                if (file_exists($img)) {
                    unlink($img);
                }
                $error['body'] = 'Notice Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewEvents");
            } else {
                $error['body'] = 'Unable to Delete Event';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewEvents");

            }
        } else {

        }
        include 'view/viewEvents.php';
    }

    if ($_GET['a'] == "editEvents") {
        if (empty($_POST)) { 
            include 'view/editEvent.php';
            return;
        }
        $eid = $_GET['id'];
        $etitle = filterText($_POST['eventTitle']);      
        $des = $_POST['description'];

    
        $editEvent = editEvent($eid, $etitle, $des);
        if ($editEvent) {
            $error['body'] = 'Event Updated';
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewEvents");
        } else {
            $error['body'] = 'Unable to Update Event';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewEvents");

        }
    }

}
ob_end_flush();