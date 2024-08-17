<?php
$mid = $_GET['id'];
$result = getMember($mid);
?> 
<div class="container">
<form action="<?php echo $base_url . '?p=home&a=editMember&id=' . $result['id']; ?>" method="POST" class="user">

    <div class="form-group row">
        <label for="inputimagename" class="col-sm-2 col-form-label">News Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-user" name="memberName" value="<?php echo $result['name']; ?>"
                >
        </div>
    </div> 
    <div class="form-group row">
        <label for="description1" class="col-sm-2 col-form-label">News Description</label>
        <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" name="memberPosition" value="<?php echo $result['position']; ?>"
                >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
        </div>
    </div>
</form>
</body>

</html>