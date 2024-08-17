
<?php
ob_start();

if(isset($_GET['a'])){
    if($_GET['a']=="viewMessage"){
        if(empty($_POST)){
            include 'view/viewMessage.php';
        }
    }
}

ob_end_flush();
?>