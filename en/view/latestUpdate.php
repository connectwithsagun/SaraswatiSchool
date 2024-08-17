<!-- Latest Update -->
<div class="container-fluid latest-update">
    <div class="container">
        <h1 class="display-4 text-center">Our Latest Update</h1>
        <div class="row text-center">

            <?php
$latestUpdate = getUpdate();
foreach ($latestUpdate as $result) {
    ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                <img src="../Admin/<?php echo $result['imagename']; ?>" width="320px" height="240px" class="card-img-top"
                    alt="latest updates of GBICS">

            </div>

            <?php }?>

        </div>
    </div>
</div>