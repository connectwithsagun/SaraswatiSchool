


    <link rel="stylesheet" type="text/css" href="./resource/css/blogpost.css">
    <script type="text/javascript" src="./resource/js/blogpost.js"></script>
 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" class="user">

                    <div class="form-group row">
                        <label for="inputimagename" class="col-form-label">Update title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control form-control-user" name="updatetitle" placeholder="Enter update title">
                        </div>
                    </div>
            
                    <div class="row"> 
                        <div class="col-md-4 imgUp">
                            <div class="imagePreview"></div>
                                <label class="btn btn-primary">Upload<input type="file" name="files[]" accept="image/*" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" multiple>
                                </label>
                            </div><!-- col-2 -->
                             <i class="fa fa-plus imgAdd"></i>
                        </div><!-- row -->
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Post update</button>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    

