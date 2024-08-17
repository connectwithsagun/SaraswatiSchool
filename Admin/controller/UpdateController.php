<?php
ob_start();
if (isset($_GET['a'])) {
    if ($_GET['a'] == "addUpdate") {
        
        if (empty($_POST)) {
            include 'view/addUpdate.php';
            return;
        } 

        $title = filterText($_POST['updatetitle']);
        $addnewupdate = add_new_update($title);
        
        
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
            
            $getid = getUpdateId(); 
            $update_id = $getid['lid'];

            $addimagename = latest_update_image($filepath,$update_id);
			
        } 
           
    } 
   
   
    if ($addnewupdate && $addimagename) {
        $msg['title'] = 'Success!!';
        $msg['body'] = "successfully added latest update";
        $msg['type'] = 'success';
        setFlash('message', $msg);
        header("location:" . $base_url . "?p=home&a=viewUpdate");
        return;
    } else {
        $msg['title'] = 'Info!!';
        $msg['body'] = "Cannot added latest update";
        $msg['type'] = 'danger';
        setFlash('message', $msg);
        header("location:" . $base_url . "?p=home&a=addUpdate");
        return;

    }  
     }


    if ($_GET['a'] == "viewUpdate") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $type = $_GET['type'];
            
            if ($type == 1 or $type == 0) {
                $changeGalleryStatus = change_Latest_Update_Status($id, $type);
                if ($changeGalleryStatus) {
                    $error['body'] = 'Latest update Status Changed!';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'success';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewUpdate");

                } else {
                    $error['body'] = 'Unable to Change latest update Status';
                    $error['title'] = 'Info: ';
                    $error['type'] = 'danger';
                    setFlash('message', $error);
                    header("location: $base_url?p=home&a=viewUpdate");
                }
            } else {

            }
        }
    }

    if ($_GET['a'] == "viewUpdate") {
        if (isset($_GET['a'])) {
            include 'view/viewUpdate.php';
        }
    }

    if ($_GET['a'] == "viewUpdateImages") {
        if (isset($_GET['a'])) {
            include 'view/viewUpdateImages.php';
        }
    }

  
    if ($_GET['a'] == "deleteLatestUpdate") {

        if (isset($_GET['id'])) {
            $lid = $_GET['id'];
            
            $imagelink = get_image_path($lid);
            
            if(empty($imagelink)){
                $deleteParentGallery = delete_parent_latest_update($lid); 
            } 
           
            $deleteGalleryPhoto = delete_latest_update($lid);
            if ($deleteGalleryPhoto || $deleteParentGallery) {
                foreach($imagelink as $img){
                    if (file_exists($img['imagename'])) {  
                        unlink($img['imagename']);
                    }
                }
                $error['body'] = 'Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewUpdate");
            } else {
                $error['body'] = 'Unable to Delete';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewUpdate");

            }   
        } else {

        }
        include 'view/viewUpdate.php';
    }

    if ($_GET['a'] == "editLatestUpdate") {
        if (empty($_POST)) {
            include 'view/editLatestUpdate.php';
            return;
        }
        $lid = $_GET['id'];
        $title = filterText($_POST['updatetitle']);
        $editLatestUpdate = edit_latest_update($lid, $title);
        if ($editLatestUpdate) {
            $error['body'] = 'Title Updated';
            $error['title'] = 'Info: ';
            $error['type'] = 'success';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewUpdate");
        } else {
            $error['body'] = 'Unable to Update title';
            $error['title'] = 'Info: ';
            $error['type'] = 'danger';
            setFlash('message', $error);
            header("location: $base_url?p=home&a=viewUpdate");

        }
    }


    if ($_GET['a'] == "deleteUpdateImage") {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $img = $_GET['img'];
            $lid = $_GET['lid'];
           
            $deleteImage = delete_update_image($id);
            if ($deleteImage) {
                    if (file_exists($img)) {  
                        unlink($img);
                    }
                $error['body'] = 'Image Deleted';
                $error['title'] = 'Info: ';
                $error['type'] = 'success';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewUpdateImages&id=$lid");
            } else {
                $error['body'] = 'Unable to Delete image';
                $error['title'] = 'Info: ';
                $error['type'] = 'danger';
                setFlash('message', $error);
                header("location: $base_url?p=home&a=viewUpdateImages&id=$lid");

            }   
        } else {

        }
        include 'view/viewGallery.php';
    }

}
ob_end_flush();