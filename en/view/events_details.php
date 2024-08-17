<?php
$id = $_GET['id'];
$eventDetails = getEventDetails($id);
$recentEvent = getRecentEvents();
if ($eventDetails) {
    ?>
<div class="container-fluid">
    <div class="container mt-5">
        <h2 class="text-center p-3 font_nepali"><?php echo $eventDetails['title']; ?></h2>
        <img src="<?php echo '../Admin/' . $eventDetails['image']; ?>" class="img-fluid w-100 d-block">
        <p class="pt-3 pb-3"><b>Posted on: <?php echo $eventDetails['date']; ?></b></p>
        <div class="content font_nepali">
            <p> <?php echo $eventDetails['description']; ?></p>
        </div>

    </div>
</div>

<?php } else {
    throwError(404, 'Requested page does not exists.');

}?>