<?php
$lid = $_GET['id'];
$result = getLatestUpdate($lid);
?>
<div class="container">
<form action="<?php echo $base_url . '?p=home&a=editLatestUpdate&id=' . $result['lid']; ?>" method="POST" class="user">

    <div class="form-group row">
        <label for="inputimagename" class="col-sm-2 col-form-label">Update title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-user" name="updatetitle" value="<?php echo $result['title']; ?>">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
        </div>
    </div>
</form>
</div> 
