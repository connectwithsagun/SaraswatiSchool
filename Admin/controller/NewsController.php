<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "addNews") {
        if (empty($_POST)) {
            include 'view/addNews.php';
            return;
        }

        $Nname = filterText($_POST['newstitle']);
        $Des = $_POST['description'];

        $target = "";
        if (!empty($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $filename = $_FILES['fileToUpload']['name']; // filename along with extension
            $newFileName = date('y_m_d_h_i_s_') . $filename;
            $tmpname = $_FILES['fileToUpload']['tmp_name'];
            $target = "resource/images/" . $newFileName;

            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
        }

        $addnewnews = add_new_news($Nname, $Des, $target);
        if ($addnewnews) {
            $msg['title'] = 'Success!!';
            $msg['body'] = "successfully added news";
            $msg['type'] = 'success';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=viewNews");
            return;
        } else {
            $msg['title'] = 'Info!!';
            $msg['body'] = "Cannot added news";
            $msg['type'] = 'danger';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=addNews");
            return;

        }
    }

    if ($_GET['a'] == "viewNews") {
        if (isset($_GET['id'])) {
            $nid = $_GET['id'];
            $type = $_GET['type'];
            if ($type == 1 or $type == 0) {
                $changeNewsStatus = changeNewsStatus($nid, $type);
                if ($changeNewsStatus) {
                    $error['body'] = 'News Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewNews");

                } else {
                    $error['body'] = 'Unable to Change News Status';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewNews");
                }
            } else {

            }

        }

        include 'view/viewNews.php';
    }

    if ($_GET['a'] == "deleteNews") {

        if (isset($_GET['id'])) {
            $nid = $_GET['id'];
            $img = $_GET['img'];

            $getNewstDescription = get_news_description($nid);
            $d =  $getNewstDescription['description'];

            $dom = new DOMDocument;
            $dom->loadHTML($d);
            $count = $dom->getElementsByTagName('img')->length;

            $deleteNewsPhoto = deleteNewsPhoto($nid);
            if ($deleteNewsPhoto) {
                
                for($i=0;$i<$count;$i++){
                    $src = $dom->getElementsByTagName('img')[$i]->getAttribute('src');
                    $s = substr($src,22);
                    unlink($s);
                }  

                if (file_exists($img)) {
                    unlink($img);
                }
                $error['body'] = 'News Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewNews");
            } else {
                $error['body'] = 'Unable to Delete News';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewNews");

            }
        } else {

        }
        include 'view/viewNews.php';
    }

    if ($_GET['a'] == "editNews") {
        if (empty($_POST)) { 
            include 'view/editNews.php'; 
            return;
        }
        $nid = $_GET['id'];
        $ntitle = filterText($_POST['newsTitle']);      
        $des = $_POST['description'];
        
       

    
        $editNews = editNews($nid, $ntitle, $des);
        if ($editNews) {
            $error['body'] = 'News Updated';
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewNews");
        } else {
            $error['body'] = 'Unable to Update News';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewNews");

        }
    }

}
ob_end_flush();