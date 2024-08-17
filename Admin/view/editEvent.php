<script src="../resource/ckeditor.js"></script>

<?php
$eid = $_GET['id'];
$result = getEvent($eid);
?>  
<div class="container">
<form action="<?php echo $base_url . '?p=home&a=editEvents&id=' . $result['id']; ?>" method="POST" class="user">

    <div class="form-group row">
        <label for="inputimagename" class="col-sm-2 col-form-label">Event Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-user font_nepali" name="eventTitle" value="<?php echo $result['title']; ?>"
                >
        </div>
    </div>
    <div class="form-group row">
        <label for="description1" class="col-sm-2 col-form-label">Event Description</label>
        <div class="col-sm-10">
        <textarea name="description" id="font_nepali" rows="10" cols="80">
         <?php echo $result['description']; ?></textarea>
            
        </div>
        <script>
                // Replac e the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
        </div>
    </div>
</form>
</body>

</html>