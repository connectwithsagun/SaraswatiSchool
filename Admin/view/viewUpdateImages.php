<div class="container">
    <div class="row">
    <?php
        $lid=$_GET['id'];
    $updateimage = view_updateimages($lid);
    if ($updateimage) { 
        foreach ($updateimage as $result) { 
            ?> 
    <div class="col-md-4 mt-5">
    <img src="<?php echo $result['imagename']; ?>"width="350px" height="200px">
    &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp

    <a href="<?php echo $base_url ."?p=home&a=deleteUpdateImage&id=" . $result['id']."&lid=".$lid."&img=" . $result['imagename']; ?>" onClick="return confirm('Are you absolutely sure you want to delete?')">
    <button type="button" class="btn btn-primary">Delete</button></a>

    </div><?php
    } }else { echo "No Photos Found";}?>

    </div>
    <p class="text-center mt-5"><a href="?p=home&a=viewUpdate">Go Back</a></p>
</div>








