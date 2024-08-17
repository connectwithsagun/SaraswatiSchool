
<?php
$result = getContact(); 
?>
 
<div class="container">
<form action="<?php echo $base_url . '?p=home&a=editContact&id=' . $result['id']; ?>" method="POST" class="user">

    <div class="form-group row">
        <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-user" name="email" value="<?php echo $result['email']; ?>"
                >
        </div>
    </div>


    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" name="phone" value="<?php echo $result['phoneno']; ?>"
                required>
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" name="address" value="<?php echo $result['address']; ?>"
                required>
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