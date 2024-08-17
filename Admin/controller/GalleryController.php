<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "addGallery") {
        
        if (empty($_POST)) {
            include 'view/addGallery.php';
            return;
        }

        $Iname = filterText($_POST['imagetitle']);
        $Des = filterText($_POST['description']);
       
        $addnewgallery = add_new_gallery($Iname, $Des);
        
        
	// Configure upload directory and allowed file types 
	$upload_dir = 'resource/images/'.DIRECTORY_SEPARATOR; 
	$allowed_types = array('jpg', 'png', 'jpeg', 'gif'); 
	
	// Define maxsize for files i.e 2MB 
	$maxsize = 2 * 1024 * 1024; 

	// Checks if user sent an empty form 
	if(!empty(array_filter($_FILES['files']['name']))) { 

		// Loop through each file in files[] array 
		foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
			
			$file_tmpname = $_FILES['files']['tmp_name'][$key]; 
			$file_name = $_FILES['files']['name'][$key]; 
			$file_size = $_FILES['files']['size'][$key]; 
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 

			// Set upload file path 
			$filepath = $upload_dir.$file_name; 
			

			// Check file type is allowed or not 
			if(in_array(strtolower($file_ext), $allowed_types)) { 

				// Verify file size - 2MB max 
				if ($file_size > $maxsize)		 
					echo "Error: File size is larger than the allowed limit."; 

				// If file with name already exist then append time in 
				// front of name of the file to avoid overwriting of file 
				if(file_exists($filepath)) { 
					$filepath = $upload_dir.time().$file_name; 
					
					if( move_uploaded_file($file_tmpname, $filepath)) { 
						//echo "{$file_name} successfully uploaded <br />"; 
					} 
					else {					 
						//echo "Error uploading {$file_name} <br />"; 
					} 
				} 
				else { 
				
					if( move_uploaded_file($file_tmpname, $filepath)) { 
						//echo "{$file_name} successfully uploaded <br />"; 
					} 
					else {					 
					    //	echo "Error uploading {$file_name} <br />"; 
					} 
				} 
 
			} 
			else { 
				
				// If file extention not valid 
				echo "Error uploading {$file_name} "; 
				echo "({$file_ext} file type is not allowed)<br / >"; 
			} 
            
            $getid = getGalleryId(); 
            $gallery_id = $getid['gid'];

            $addimagepath = add_image_path($filepath,$gallery_id);
			
        } 
           
    } 
   
   
    if ($addnewgallery && $addimagepath) {
        $msg['title'] = 'Success!!';
        $msg['body'] = "successfully added gallery";
        $msg['type'] = 'success';
        setFlash('message', $msg);
        header("location:" . $base_url . "?p=home&a=viewGallery");
        return;
    } else {
        $msg['title'] = 'Info!!';
        $msg['body'] = "Cannot added gallery";
        $msg['type'] = 'danger';
        setFlash('message', $msg);
        header("location:" . $base_url . "?p=home&a=addGallery");
        return;

    }
 
       
     }


    if ($_GET['a'] == "viewGallery") {
        if (isset($_GET['id'])) {
            $uid = $_GET['id'];
            $type = $_GET['type'];
            if ($type == 1 or $type == 0) {
                $changeGalleryStatus = changeGalleryStatus($uid, $type);
                if ($changeGalleryStatus) {
                    $error['body'] = 'Gallery Status Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewGallery");

                } else {
                    $error['body'] = 'Unable to Change Gallery Status';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewGallery");
                }
            } else {

            }

        }

        include 'view/viewGallery.php';
    }

    if ($_GET['a'] == "viewImages") {
        if (isset($_GET['id'])) {
            include 'view/viewGalleryImages.php';
        }
    }

 
    if ($_GET['a'] == "deleteGallery") {

        if (isset($_GET['id'])) {
            $gid = $_GET['id'];
            
            $imagelink = get_image_link($gid);
            if(empty($imagelink)){
                $deleteParentGallery = delete_parent_gallery($gid); 
            }
            $deleteGalleryPhoto = deleteGalleryPhoto($gid);
            if ($deleteGalleryPhoto || $deleteParentGallery) {
                foreach($imagelink as $img){
                    if (file_exists($img['imagename'])) {  
                        unlink($img['imagename']);
                    }
                }
                $error['body'] = 'Gallery Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewGallery");
            } else {
                $error['body'] = 'Unavlr to Delete Gallery';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewGallery");

            }   
        } else {

        }
        include 'view/viewGallery.php';
    }

    if ($_GET['a'] == "editGallery") {
        if (empty($_POST)) {
            include 'view/editGallery.php';
            return;
        }
        $gid = $_GET['id'];
        $ititle = filterText($_POST['imagetitle']);
        $des = filterText($_POST['description']);
        $editGallery = editGallery($gid, $ititle, $des);
        if ($editGallery) {
            $error['body'] = 'Gallery Updated';
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewGallery");
        } else {
            $error['body'] = 'Unable to Update Gallery';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewGallery");

        }
    }


    if ($_GET['a'] == "deleteImage") {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $img = $_GET['img'];
            $gid = $_GET['gid'];
            
            $deleteImage = delete_image($id);
            if ($deleteImage) {
                    if (file_exists($img)) {  
                        unlink($img);
                    }
                $error['body'] = 'Image Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewImages&id=$gid");
            } else {
                $error['body'] = 'Unable to Delete image';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewImages&id=$gid");

            }   
        } else {

        }
        include 'view/viewGallery.php';
    }

}
ob_end_flush();