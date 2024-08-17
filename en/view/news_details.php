<?php
$id = $_GET['id'];
$newsDetails = getNewsDetails($id);
$recentNews = getRecentNews();
if ($newsDetails) {
    ?>
<div class="container-fluid">
    <div class="container mt-5">
        <h2 class="text-center p-3 font_nepali"><?php echo $newsDetails['title']; ?></h2>
        <img src="<?php echo '../Admin/' . $newsDetails['image']; ?>" class="img-fluid w-100 d-block">
        <p class="pt-3 pb-3"><b>Posted on: <?php echo $newsDetails['date']; ?></b></p>
        <div class="content font_nepali">
            <p> <?php echo $newsDetails['description']; ?></p>
        </div>

    </div>
</div>

<?php } else {
    throwError(404, 'Requested page does not exists.');

}?>