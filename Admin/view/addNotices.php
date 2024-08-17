<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./resource/css/blogpost.css">
    <script type="text/javascript" src="./resource/js/blogpost.js"></script>
    <title>Notice Add</title>
</head>
 
<body>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" class="user">
 
        <div class="form-group row">
            <label for="inputfornotice" class="col-sm-2 col-form-label">Notice Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user font_nepali" name="noticetitle" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputfordescription" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control font_nepali" name="description" id="exampleFormControlTextarea3" rows="7"
                    required></textarea>
            </div>
        </div>
        <div class="form-group row"> 
            <label for="inputforfiles" class="col-sm-2 col-form-label">Add Files</label>
            <div class="col-sm-10">
            <input type="file" name="fileToUpload1" id="fileToUpload1" accept=".pdf,.docx" optional>
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
                        <button type="submit" class="btn btn-primary btn-user btn-block">Add Notice</button>
                 </div>
            </div>
        </div> 
    </form>
</body>

</html>