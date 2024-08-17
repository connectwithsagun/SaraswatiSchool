<?php
$gid = $_GET['id'];
$result = getGallery($gid);
?>
<div class="container">
<form action="<?php echo $base_url . '?p=home&a=editGallery&id=' . $result['gid']; ?>" method="POST" class="user">

    <div class="form-group row">
        <label for="inputimagename" class="col-sm-2 col-form-label">Image Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-user" name="imagetitle" value="<?php echo $result['name']; ?>"
                placeholder="Enter Image Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="description1" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="description" id="exampleFormControlTextarea3" rows="7"
                required><?php echo $result['description']; ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
        </div>
    </div>
</form>
</div> 
