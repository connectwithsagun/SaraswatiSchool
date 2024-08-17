 <div class="container">
    <div class="row">
    <?php
        $gid=$_GET['id'];
    $gallery = view_galleryimages($gid);
    if ($gallery) { 
        foreach ($gallery as $result) { 
            ?> 
    <div class="col-md-4 mt-5">
    <img src="<?php echo $result['imagename']; ?>"width="350px" height="200px">
    &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp

    <a href="<?php echo $base_url ."?p=home&a=deleteImage&id=" . $result['id']."&gid=".$gid."&img=" . $result['imagename']; ?>" onClick="return confirm('Are you absolutely sure you want to delete?')">
    <button type="button" class="btn btn-primary">Delete</button></a>

    </div><?php
    } }else { echo "No Photos Found";}?>

    </div>
    <p class="text-center mt-5"><a href="?p=home&a=viewGallery">Go Back</a></p>
</div>








