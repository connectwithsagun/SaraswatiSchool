<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "addDonor") {
        if (empty($_POST)) {
            include 'view/addDonor.php'; 
            return;
        }

        $dname = filterText($_POST['name']);
        $dadd = filterText($_POST['address']);
        $amt = filterText($_POST['amount']);


        $addnewdonor = add_new_donor($dname, $dadd, $amt);
        if ($addnewdonor) {
            $msg['title'] = 'Success!!';
            $msg['body'] = "successfully added donor";
            $msg['type'] = 'success';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=viewDonor");
            return;
        } else {
            $msg['title'] = 'Info!!';
            $msg['body'] = "Cannot added donor";
            $msg['type'] = 'danger';
            setFlash('message', $msg);
            header("location:" . $base_url . "?p=home&a=addDonor");
            return;

        }
    }

    if ($_GET['a'] == "viewDonor") {
        if (isset($_GET['id'])) { 
            $did = $_GET['id'];
            $type = $_GET['type'];
            if ($type == 1 or $type == 0) {
                $changeDonorStatus = changeDonorStatus($did, $type);
                if ($changeDonorStatus) {
                    $error['body'] = 'Donor status Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewDonor");

                } else {
                    $error['body'] = 'Unable to Change Donor Status';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewDonor"); 
                }
            } else {

            }

        }
 
        include 'view/viewDonor.php';
    }

    if ($_GET['a'] == "deleteDonor") {

        if (isset($_GET['id'])) {
            $did = $_GET['id'];
            $deleteDonor = deleteDonor($did);
            if ($deleteDonor) {
                $error['body'] = 'Donor Deleted'; 
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewDonor");
            } else {
                $error['body'] = 'Unable to Delete Donor';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewDonor");

            }
        } else {

        }
        include 'view/viewDonor.php';
    }

    if ($_GET['a'] == "editDonor") {
        if (empty($_POST)) { 
            include 'view/editDonor.php';
            return;
        }
        $did = $_GET['id'];
        $dname = filterText($_POST['donorName']);      
        $daddress = filterText($_POST['donorAddress']);
        $amt = filterText($_POST['Amount']);
        
       

    
        $editDonor = editDonor($did, $dname, $daddress, $amt);
        if ($editDonor) {
            $error['body'] = 'Donor Details Updated'; 
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewDonor");
        } else {
            $error['body'] = 'Unable to Update Donor Details';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewDonor");

        }
    }

}
ob_end_flush();