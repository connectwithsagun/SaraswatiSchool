<!DOCTYPE html>
<html> 
  
<head>
    <link rel="stylesheet" type="text/css" href="./resource/css/blogpost.css">
    <script type="text/javascript" src="./resource/js/blogpost.js"></script>
    <script src="../resource/ckeditor.js"></script>
    <title>News Add</title>
</head> 
 
<body>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" class="user">
 
        <div class="form-group row">
            <label for="inputimagename" class="col-sm-2 col-form-label">News Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user font_nepali" name="newstitle" >
            </div>
        </div>
        <div class="form-group row">
            <label for="description1" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <textarea name="description" id="font_nepali" rows="10" cols="80">
      
            </textarea>
            </div>

            <script>
                // Replac e the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
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
                        <button type="submit" class="btn btn-primary btn-user btn-block">Add News</button>
                 </div>
            </div>
        </div> 
    </form>
</body>

</html>