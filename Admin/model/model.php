<?php
function db_connect()
{
    $host = "localhost"; 
    $username = "root";
    $password = "";
    $database = "saraswati";

    $conxn = mysqli_connect($host, $username, $password, $database) or die(mysqli_error($conxn));

// Check connection 
    if ($conxn->connect_error) {
        die("Connection failed: " . $conxn->connect_error);
    }
    return $conxn;
}

function admin_login($username, $password)
{

    $conxn = db_connect();
    $sql = "SELECT * FROM tbl_users WHERE email = '$username' AND password = '$password' ";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}
function checkstatus($username)
{
    $conxn = db_connect();
    $sql = "SELECT status FROM tbl_users WHERE email = '$username' ";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    } 
}
function checkemail($email)
{
    $conxn = db_connect();
    $sql = "SELECT * from tbl_users WHERE email = '$email' limit 1";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    } 
}
function view_admin()
{
    $admin = array();
    $conxn = db_connect();
    $sql = "SELECT * FROM tbl_users";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($admin, $row);
        }
        return $admin;
    } else {
        return false();
    }
}
 
function add_admin($name, $username, $email, $password, $phone, $type)
{
    $conxn = db_connect();
    $adminname=mysqli_real_escape_string($conxn,$name);
    $Username=mysqli_real_escape_string($conxn,$username);
    $Email=mysqli_real_escape_string($conxn,$email);
    $sql = "INSERT INTO tbl_users (name,username,email,password,mobileno,uType) VALUES ('$adminname','$Username','$Email','$password','$phone','$type')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function delete_admin($uid)
{
    $conxn = db_connect();
    $sql = "DELETE FROM tbl_users WHERE userID='$uid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}
function changeAdminStatus($uid, $type)
{
    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_users SET status='0' WHERE userID='$uid'";

    } else {
        $sql = "UPDATE tbl_users SET status='1' WHERE userID='$uid'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function update_profileImage($uid, $target)
{
    $conxn = db_connect();
    //for profile update
    $sql = "UPDATE tbl_users SET image='$target' WHERE userID='$uid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    //for getting new updated image
    $sql1 = "SELECT image FROM tbl_users WHERE userID='$uid'";
    $result1 = mysqli_query($conxn, $sql1) or die(mysqli_error($conxn));

    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        $row = mysqli_fetch_assoc($result1);
        return $row;
    } else {
        return false;
    }

}


function getGallery($gid)
{
    $conxn = db_connect();
    $sql = "Select * from tbl_gallery where gid='$gid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function editGallery($gid, $ititle, $des)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_gallery SET name='$ititle',description='$des' WHERE gid='$gid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function changeGalleryStatus($uid, $type)
{
    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_gallery SET status='0' WHERE gid='$uid'";
    } else {
        $sql = "UPDATE tbl_gallery SET status='1' WHERE gid='$uid'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function add_new_gallery($Iname, $Des)
{   $conxn = db_connect();
    $date = date('Y-m-d');
    $name=mysqli_real_escape_string($conxn,$Iname);
    $des=mysqli_real_escape_string($conxn,$Des);
    $conxn = db_connect();
    $sql = "INSERT INTO tbl_gallery(name,description,date)values('$name','$des','$date')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
} 

function add_image_path($filepath,$gallery_id)
{
    $conxn = db_connect();
    $sql = "INSERT INTO tbl_gallery_images(gid,imagename)values('$gallery_id','$filepath')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}

function getGalleryId()
{
    $conxn = db_connect();
    $sql = "Select gid from tbl_gallery ORDER BY gid DESC LIMIT 1";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function select_image($gid)
{
    $conxn = db_connect();
    $sql = "SELECT name,description,date
    FROM tbl_gallery
    RIGHT JOIN tbl_gallery_images
    ON tbl_gallery.gid = tbl_gallery_images.gid;";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }

}

function deleteGalleryPhoto($gid)
{
    $conxn = db_connect();
    $sql = "DELETE tbl_gallery, tbl_gallery_images
    FROM tbl_gallery
    INNER JOIN tbl_gallery_images ON tbl_gallery.gid = tbl_gallery_images.gid
    WHERE tbl_gallery_images.gid ='$gid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}

function delete_image($id)
{
    $conxn = db_connect();
    $sql = "DELETE from tbl_gallery_images where id='$id'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function delete_parent_gallery($gid)
{
    $conxn = db_connect();
    $sql = "DELETE from tbl_gallery where gid='$gid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function view_galleryimages($gid)
{  
    $gallery = array();
    $conxn = db_connect();
    $sql = "Select id,imagename from tbl_gallery_images where gid='$gid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($gallery, $row);
        }
        return $gallery;
    } else {
        return false;
    }
}

// for gallery
function get_image_link($gid)
{
    $imagepath = array();
    $conxn = db_connect();
    $sql = "Select imagename from tbl_gallery_images where gid='$gid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
      while($row = mysqli_fetch_assoc($result)){
          array_push($imagepath,$row);
      }
        return $imagepath;
    } else {
        return false;
    }
}

function add_new_update($title)
{   $conxn = db_connect();
    $date = date('Y-m-d');
    $name=mysqli_real_escape_string($conxn,$title);
    $conxn = db_connect();
    $sql = "INSERT INTO tbl_latest_update(title,date)values('$title','$date')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
} 


function getUpdateId()
{
    $conxn = db_connect();
    $sql = "Select lid from tbl_latest_update ORDER BY lid DESC LIMIT 1";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function latest_update_image($filepath,$update_id)
{
    $conxn = db_connect();
    $sql = "INSERT INTO tbl_latest_update_images(lid,imagename)values('$update_id','$filepath')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {
        return $result;
    } else {
        return false;
    }
}


function view_updateimages($id)
{  
    $updateimage = array();
    $conxn = db_connect();
    $sql = "Select id,imagename from tbl_latest_update_images where lid='$id'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($updateimage, $row);
        }
        return $updateimage;
    } else {
        return false;
    }
}

function getLatestUpdate($lid)
{

    $conxn = db_connect();
    $sql = "Select * from tbl_latest_update where lid='$lid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function edit_latest_update($lid, $title)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_latest_update SET title='$title' WHERE lid='$lid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function get_image_path($lid)
{
    $imagepath = array();
    $conxn = db_connect();
    $sql = "Select imagename from tbl_latest_update_images where lid='$lid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
      while($row = mysqli_fetch_assoc($result)){
          array_push($imagepath,$row);
      }
        return $imagepath;
    } else {
        return false;
    }
}


function delete_parent_latest_update($lid)
{
    $conxn = db_connect();
    $sql = "DELETE from tbl_latest_update where lid='$lid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function delete_latest_update($lid)
{
    $conxn = db_connect();
    $sql = "DELETE tbl_latest_update, tbl_latest_update_images
    FROM tbl_latest_update
    INNER JOIN tbl_latest_update_images ON tbl_latest_update.lid = tbl_latest_update_images.lid
    WHERE tbl_latest_update_images.lid ='$lid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {
        return $result;
    } else {
        return false;
    }
}


function delete_update_image($id)
{
    $conxn = db_connect();
    $sql = "DELETE from tbl_latest_update_images where id='$id'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}


function change_Latest_Update_Status($id, $type)
{
    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_latest_update SET status='0' WHERE lid='$id'";
    } else {
        $sql = "UPDATE tbl_latest_update SET status='1' WHERE lid='$id'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }

}



function addSlider($slidertitle, $sliderdesc, $target)
{
    $conxn = db_connect();
    $date = date('Y-m-d');
    $slidername=mysqli_real_escape_string($conxn,$slidertitle);
    $sliderdescription=mysqli_real_escape_string($conxn,$sliderdesc);
    $sql = "INSERT INTO tbl_slider (image,title,description,date)values('$target','$slidername','$sliderdescription','$date')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {
        return true;
    } else { 
        return false;
    }
}

function deleteSlider($sid)
{
    $conxn = db_connect();
    $sql = "delete from tbl_slider where id='$sid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function getSlider($sid)
{
    $conxn = db_connect();
    $sql = "Select * from tbl_slider where id='$sid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function editSlider($sid, $stitle, $des)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_slider SET title='$stitle',description='$des' WHERE id='$sid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
} 

function changeSliderStatus($sid, $type)
{
    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_slider SET status='0' WHERE id='$sid'";
    } else {
        $sql = "UPDATE tbl_slider SET status='1' WHERE id='$sid'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function changeNoticeStatus($nid, $type)
{
    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_notice SET status='0' WHERE id='$nid'";
    } else {
        $sql = "UPDATE tbl_notice SET status='1' WHERE id='$nid'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function deleteNoticePhoto($nid)
{
    $conxn = db_connect();

    $sql = "delete from tbl_notice where id='$nid'";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result; 
    } else {
        return false; 
    }
}

function add_new_notice($Nname, $Des, $target , $target1)
{
    $conxn = db_connect();
    $date = date('Y-m-d');
    $noticename=mysqli_real_escape_string($conxn,$Nname);
    $noticedesc=mysqli_real_escape_string($conxn,$Des);
    $sql = "INSERT INTO tbl_notice (image,file,title,description,date)values('$target','$target1','$noticename','$noticedesc','$date')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {
        return true;
    } else { 
        return false;
    }
}

function getNotice($nid) 
{
    $conxn = db_connect();
    $sql = "Select * from tbl_notice where id='$nid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function editNotice($nid, $ntitle, $des)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_notice SET title='$ntitle',description='$des' WHERE id='$nid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }

}



function changeEventStatus($eid, $type)
{
    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_events SET status='0' WHERE id='$eid'";
    } else {
        $sql = "UPDATE tbl_events SET status='1' WHERE id='$eid'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function deleteEventPhoto($eid)
{
    $conxn = db_connect();

    $sql = "delete from tbl_events where id='$eid'";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}

function add_new_event($Ename, $Des, $target)
{
    $conxn = db_connect();
    $date = date('Y-m-d');
    $name=mysqli_real_escape_string($conxn,$Ename);
    $des=mysqli_real_escape_string($conxn,$Des);
   
    $sql = "INSERT INTO tbl_events (title,description,date,image) values('$name','$des','$date','$target')";
   
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}

function getEvent($eid)
{
    $conxn = db_connect();
    $sql = "Select * from tbl_events where id='$eid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function get_event_description($eid)
{
    $conxn = db_connect();
    $sql = "Select description from tbl_events where id='$eid'";
    
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

// function editEvent($eid, $ititle, $des)
// {
//     $conxn = db_connect();
//     $sql = "UPDATE tbl_events SET title='$ititle',description='$des' WHERE id='$eid'";
//     $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
//     $affRows = mysqli_affected_rows($conxn);
//     mysqli_close($conxn);
//     if ($affRows > 0) {
//         return true;
//     } else {
//         return false;
//     }

// }


function editEvent($eid, $ititle, $des)
{
    $conxn = db_connect();
    
    // Prepare an SQL statement for execution
    $stmt = $conxn->prepare("UPDATE tbl_events SET title=?, description=? WHERE id=?");
    
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssi", $ititle, $des, $eid);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Check how many rows were affected
    $affRows = $stmt->affected_rows;
    
    // Close the statement and the connection
    $stmt->close();
    $conxn->close();
    
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}



function changeNewsStatus($nid, $type)
{

    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_news SET status='0' WHERE id='$nid'";
    } else {
        $sql = "UPDATE tbl_news SET status='1' WHERE id='$nid'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false; 
    }

}
function deleteNewsPhoto($nid)
{
    $conxn = db_connect();

    $sql = "delete from tbl_news where id='$nid'";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}
function add_new_news($Nname, $Des, $target)
{
    $conxn = db_connect();
    $date = date('Y-m-d');
    $newsname=mysqli_real_escape_string($conxn,$Nname);
    $newsdesc=mysqli_real_escape_string($conxn,$Des);


    $sql = "INSERT INTO tbl_news (title,description,date,image) values('$newsname','$newsdesc','$date','$target')";
   
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}
function getNews($nid)
{ 
    $conxn = db_connect();
    $sql = "Select * from tbl_news where id='$nid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}
// function editNews($nid, $ntitle, $des)
// {
//     $conxn = db_connect();
//     $sql = "UPDATE tbl_news SET title='$ntitle',description='$des' WHERE id='$nid'";
//     $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
//     $affRows = mysqli_affected_rows($conxn);
//     mysqli_close($conxn);
//     if ($affRows > 0) {
//         return true;
//     } else {
//         return false;
//     }
// }

function editNews($nid, $ntitle, $des)
{
    $conxn = db_connect();
    
    // Prepare an SQL statement for execution
    $stmt = $conxn->prepare("UPDATE tbl_news SET title=?, description=? WHERE id=?");
    
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssi", $ntitle, $des, $nid);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Check how many rows were affected
    $affRows = $stmt->affected_rows;
    
    // Close the statement and the connection
    $stmt->close();
    $conxn->close();
    
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}




function get_news_description($nid)
{
    $conxn = db_connect();
    $sql = "Select description from tbl_news where id='$nid'";
    
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function changeMemberStatus($mid, $type)
{

    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_members SET status='0' WHERE id='$mid'";
    } else {
        $sql = "UPDATE tbl_members SET status='1' WHERE id='$mid'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }

}
function add_new_member($Mname, $Pos, $target)
{
    $conxn = db_connect();
    $membername=mysqli_real_escape_string($conxn,$Mname);
    $memberpos=mysqli_real_escape_string($conxn,$Pos);

    $sql = "INSERT INTO tbl_members (name,position,image) values('$membername','$memberpos','$target')";
   
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}
function deleteMemberPhoto($mid)
{
    $conxn = db_connect();

    $sql = "delete from tbl_members where id='$mid'";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}
function getMember($mid)
{
    $conxn = db_connect();
    $sql = "Select * from tbl_members where id='$mid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}
function editMember($mid, $mname, $mpos)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_members SET name='$mname',position='$mpos' WHERE id='$mid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function changeDonorStatus($did, $type)
{

    $sql = null;
    $conxn = db_connect();
    if ($type == 1) {
        $sql = "UPDATE tbl_donors SET status='0' WHERE id='$did'";
    } else {
        $sql = "UPDATE tbl_donors SET status='1' WHERE id='$did'";
    }
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }

}

function add_new_donor($dname, $dadd, $amt)
{
    $conxn = db_connect();
    $donorname=mysqli_real_escape_string($conxn,$dname);
    $donoradd=mysqli_real_escape_string($conxn,$dadd);
    $sql = "INSERT INTO tbl_donors (name,address,amount) values('$donorname','$donoradd','$amt')";
   
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;   
    } else {
        return false; 
    } 
}
function deleteDonor($did)
{
    $conxn = db_connect();

    $sql = "delete from tbl_donors where id='$did'";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($result) {

        return $result;
    } else {
        return false;
    }
}
function getDonor($did)
{
    $conxn = db_connect();
    $sql = "Select * from tbl_donors where id='$did'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}
function editDonor($did, $dname, $daddress, $amt)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_donors SET name='$dname',address='$daddress',amount='$amt' WHERE id='$did'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function getContact()
{
    $conxn = db_connect();
    $sql = "Select * from tbl_contact ";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}
function editContact($cid, $Email, $Phone, $Address)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_contact SET email='$Email',phoneno='$Phone',address='$Address' WHERE id='$cid'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}

function tokenForReset($email, $token)
{
    $conxn = db_connect();
    $sql = "INSERT INTO tbl_password_reset (email,token) VALUES ('$email','$token')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}
//get email for reset password
function getEmail($token)
{
    $conxn = db_connect();
    $sql = "SELECT * FROM tbl_password_reset WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }

}
function setnewpass($email, $enpassword)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_guests SET gPassword= '$enpassword' WHERE gEmail='$email'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}
function setTokenNull($tokenID)
{
    $conxn = db_connect();
    $sql = "UPDATE tbl_password_reset SET token= 'null' WHERE resetID='$tokenID'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }

}

function countEvent()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_events";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getEventsList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $events = array();
    $sql = "SELECT * FROM tbl_events LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($events, $row);
        }

        return $events;
    } else {
        return false;
    }

}

function countNews()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_news";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getNewsList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $news = array();
    $sql = "SELECT * FROM tbl_news LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($news, $row);
        }

        return $news;
    } else {
        return false;
    }

}


function countNotice()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_notice";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getNoticeList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $notice = array();
    $sql = "SELECT * FROM tbl_notice LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($notice, $row);
        }

        return $notice;
    } else {
        return false;
    }

}


function countGallery()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_gallery";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getGalleryList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $gallery = array();
    $sql = "SELECT * FROM tbl_gallery LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($gallery, $row);
        }

        return $gallery;
    } else {
        return false;
    }

}


function countSlider()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_slider";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getSliderList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $slider = array();
    $sql = "SELECT * FROM tbl_slider LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($slider, $row);
        }

        return $slider;
    } else {
        return false;
    }

}

function countMember()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_members";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getMemberList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $member = array();
    $sql = "SELECT * FROM tbl_members LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($member, $row);
        }

        return $member;
    } else {
        return false;
    }

}


function countDonor()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_donors";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getDonorList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $donor = array();
    $sql = "SELECT * FROM tbl_donors LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($donor, $row);
        }

        return $donor;
    } else {
        return false;
    }

}



function countUpdate()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_latest_update";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getUpdateList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $latest = array();
    $sql = "SELECT * FROM tbl_latest_update LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($latest, $row);
        }

        return $latest;
    } else {
        return false;
    }

}



function countMessage()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_contact_us";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getMessageList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $message = array();
    $sql = "SELECT * FROM tbl_contact_us LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($message, $row);
        }

        return $message;
    } else {
        return false;
    }

}

?>