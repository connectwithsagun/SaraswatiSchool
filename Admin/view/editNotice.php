<?php
$nid = $_GET['id']; 
$result = getNotice($nid);
?>
<div class="container">
<form action="<?php echo $base_url . '?p=home&a=editNotices&id=' . $result['id']; ?>" method="POST" class="user">

    <div class="form-group row">
        <label for="inputimagename" class="col-sm-2 col-form-label">Notice Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-user font_nepali" name="noticeTitle" value="<?php echo $result['title']; ?>">
        </div>
    </div>
    <div class="form-group row"> 
        <label for="description1" class="col-sm-2 col-form-label">Notice Description</label>
        <div class="col-sm-10">
            <textarea class="form-control  font_nepali" name="noticedesc" id="exampleFormControlTextarea3" rows="7"
                required><?php echo $result['description']; ?></textarea>
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