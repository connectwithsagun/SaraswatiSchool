<?php
$did = $_GET['id'];
$result = getDonor($did);
?> 
<div class="container">
<form action="<?php echo $base_url . '?p=home&a=editDonor&id=' . $result['id']; ?>" method="POST" class="user">

    <div class="form-group row">
        <label for="inputdonorname" class="col-sm-2 col-form-label">Donor Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-user" name="donorName" value="<?php echo $result['name']; ?>"
                >
        </div> 
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" name="donorAddress" value="<?php echo $result['address']; ?>"
                >
        </div>
    </div>
    <div class="form-group row">
        <label for="amount" class="col-sm-2 col-form-label">Amount</label>
        <div class="col-sm-10">
        <input type="text" class="form-control form-control-user" name="Amount" value="<?php echo $result['amount']; ?>"
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