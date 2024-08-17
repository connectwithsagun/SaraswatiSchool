<!--Slider -->
<div id="carouselExampleCaptions" class="carousel slide slider" data-ride="carousel">

    <div class="carousel-inner">


        <?php
$slider = getSlider();
$activeID = getLastIDForSlider();
if (empty($slider)) {
    echo "Slider Not Found";
} else {
    foreach ($slider as $result) {
        ?>


        <div class="carousel-item <?php if ($activeID == $result['id']) {echo 'active';}?>">
            <img src="<?php echo '../Admin/' . $result['image']; ?>" class="d-block w-100 h-90 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <div class="jumbotron">
                    <h1 class="display-4"><?php echo $result['title']; ?></h1>
                    <p class="lead"><?php echo $result['description']; ?></p>
                    <hr class="my-4">

                </div>
            </div>
        </div>
        <?php }}?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>