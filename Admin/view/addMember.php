<!DOCTYPE html>
<html> 

<head>
    <link rel="stylesheet" type="text/css" href="./resource/css/blogpost.css">
    <script type="text/javascript" src="./resource/js/blogpost.js"></script>
    <title>Member Add</title>
</head> 

<body>
    <div class="container">  
        <form method="POST" enctype="multipart/form-data" class="user">
 
        <div class="form-group row">
            <label for="inputimagename" class="col-sm-2 col-form-label">Member Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" name="name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="description1" class="col-sm-2 col-form-label">Position</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" name="position"required >

            </div>
        </div>
        
        <div class="row"> 
                 <div class="col-md-4 imgUp">
                    <div class="imagePreview"></div>
                        <label class="btn btn-primary">Upload<input type="file" name="fileToUpload" accept="image/*" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                        </div><!-- col-2 -->
                             <i class="fa fa-plus imgAdd"></i>
                        </div><!-- row -->
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Add Member</button>
                 </div>
            </div>
        </div> 
    </form>
</body>

</html>