<!DOCTYPE html>
<html> 

<head>
    <link rel="stylesheet" type="text/css" href="./resource/css/blogpost.css">
    <script type="text/javascript" src="./resource/js/blogpost.js"></script>
    <title>Donor Add</title>
</head> 

<body>
    <div class="container"> 
        <form method="POST" enctype="multipart/form-data" class="user">
  
        <div class="form-group row">
            <label for="inputforname" class="col-sm-2 col-form-label">Donor Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" name="name" placeholder="Enter the Donor Name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputforaddresss" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" name="address" placeholder="Enter the Donor Address" required >

            </div>
        </div>
        <div class="form-group row">
            <label for="inputforamount" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <input type="number" class="form-control form-control-user" name="amount" placeholder="Enter The Amount" required >

            </div>
        </div>        
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Add Donor</button>
                 </div>
            </div>
        </div> 
    </form>
</body>

</html>