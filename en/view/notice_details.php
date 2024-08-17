<?php
$id = $_GET['id'];
$noticeDetails = getNoticeDetails($id);
$recentNotice = getRecentNotice();
if ($noticeDetails) {
    ?>
<div class="container-fluid">
    <div class="container mt-5">
        <h2 class="text-center p-3 font_nepali"><?php echo $noticeDetails['title']; ?></h2>
        <img src="<?php echo '../Admin/' . $noticeDetails['image']; ?>" class="img-fluid w-100 d-block">
        <p class="pt-3 pb-3"><b>Posted on: <?php echo $noticeDetails['date']; ?></b></p>
        <div class="content">
            <p> <?php echo $noticeDetails['description']; ?></p>

        </div>
        <div class="content font_nepali">
            <?php if ($noticeDetails['file']) {?>
                <h5>Files</h5>
            <p> <a href="../Admin/<?php echo $noticeDetails['file']; ?>"><?php echo substr($noticeDetails['file'], 33); ?></a></p>
            <?php }?>
        </div>
    </div>

    <?php } else {
    throwError(404, 'Requested page does not exists.');

}?>