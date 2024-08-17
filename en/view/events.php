<!-- events/news/notice-->
<?php
$events = getEvents();
$news = getNews();
$notice = getNotice();
?>
<div class="container-fluid about mb-5">
    <div class="container">
        <div class="row">
           <div class="col-lg-4 col-md-6 col-sm-12 mt-3 " >
                <h4 >EVENTS</h4>
                <hr />
                <ul> <?php if (empty($events)) {
    echo "No Events Founds";
} else {
    foreach ($events as $result) {?>
                    <li class="font_nepali"><i class="fa fa-angle-right"></i> <a href="?p=eventDetails&id=<?php echo $result['id']; ?>"><?php $t = $result['title'];
        echo implode(' ', array_slice(explode(' ', $t), 0, 10));?></a>
                    </li>
                    <?php }}if (count($events) >= 5) {?>
                    <div class="mt-2 text-right"><a href="?p=events"> <button class="btn btn-primary">More</button></a>
                        <div>
                            <?php }?>
                </ul>
            </div>
           <div class="col-lg-4 col-md-6 col-sm-12 mt-3 " >
                <h4>NEWS</h4>
                <hr />
                <ul>
                     <?php if (empty($news)) {
    echo "No News Founds";
} else {
    foreach ($news as $r) {?>
                        <li class="font_nepali"><i class="fa fa-angle-right"></i> <a href="?p=newsDetails&id=<?php echo $r['id']; ?>"><?php $t = $r['title'];
        echo implode(' ', array_slice(explode(' ', $t), 0, 10));?></a>
                        </li>

                        <?php }}?>
                        <?php if (count($news) >= 5) {?>
                        <div class="mt-2 text-right"><a href="?p=news"> <button
                                    class="btn btn-primary">More</button></a>
                            <div>
                                <?php }?>
                </ul>
            </div>
          <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                <h4>NOTICE</h4>
                <hr />
                <ul>
                     <?php if (empty($notice)) {
    echo "No Notice Founds";
} else {
    foreach ($notice as $re) {?>
                        <li class="font_nepali"><i class="fa fa-angle-right"></i> <a href="?p=noticeDetails&id=<?php echo $re['id']; ?>"><?php $t = $re['title'];
        echo implode(' ', array_slice(explode(' ', $t), 0, 10));?></a>
                        </li>

                        <?php }}?>
                        <?php if (count($notice) >= 5) {?>
                        <div class="mt-2 text-right"><a href="?p=notice"> <button
                                    class="btn btn-primary">More</button></a>
                            <div>
                                <?php }?>
                </ul>
            </div>
        </div>
    </div>
</div>