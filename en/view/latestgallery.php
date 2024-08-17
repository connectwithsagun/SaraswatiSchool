<!-- Latest Gallery -->
<div class="container-fluid latest-gallery">

    <div class="container">
        <div class="display-4 text-center">Our Latest Gallery</div>
        <div class="row mt-4">
            <?php
$gallery = getRecentGallery();

if (empty($gallery)) {
    echo "Gallery Not Found";
} else {
    foreach ($gallery as $result) {
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                <a href="<?php echo '../Admin/' . $result['imagename']; ?>" data-lightbox="example-set" data-title="">
                    <img src="../Admin/<?php echo $result['imagename']; ?>" width="320px" height="240px"
                        class="card-img-top img-responsive zoom-img" alt="img">


                </a>
            </div>

            <?php }}?>
        </div>
        <div class="text-center mt-2">
       <a href="?p=gallery" class="btn btn-primary">View More</a>
    </div>
</div></div>