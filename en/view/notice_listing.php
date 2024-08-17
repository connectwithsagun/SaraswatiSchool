<?php
$recentNotice = getRecentNotice();
?>

<?php
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
$total_records_per_page = 12;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$total_records = countnotice();
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total page minus 1

$notice = getNoticeList($offset, $total_records_per_page);
?>
<div class="cointainer-fluid events">
    <div class="container">

        <h1 class="display-4 text-center">Latest Notice</h1>
        <div class="row">
            <?php if (empty($notice)) {
    echo "No Events Found";
} else {

    foreach ($notice as $result) {?>
            <div class="col-lg-6">

                <ul class="list-unstyled list-cont">
                    <li class="media mt-3">
                        <img src="<?php echo '../Admin/' . $result['image']; ?>" class="mr-3" width="75px"
                            height="75px">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1 font_nepali"><a href="?p=noticeDetails&id=<?php echo $result['id']; ?>"><?php $t = $result['title'];
        echo implode(' ', array_slice(explode(' ', $t), 0, 12))?></a></h5>
                            <p><i class="fa fa-calendar"></i> <?php echo $result['date']; ?></p>

                        </div>
                    </li>
                </ul>
            </div>
            <?php }}?>
        </div>
        <ul class="pagination">
            <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

            <li <?php if ($page_no <= 1) {echo "class='disabled'";}?>>
                <a <?php if ($page_no > 1) {echo "href='?p=notice&page_no=$previous_page'";}?>>Previous</a>
            </li>

            <?php
if ($total_no_of_pages <= 10) {
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
        if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";
        } else {
            echo "<li><a href='?p=notice&page_no=$counter'>$counter</a></li>";
        }
    }
} elseif ($total_no_of_pages > 10) {

    if ($page_no <= 4) {
        for ($counter = 1; $counter < 8; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=notice&page_no=$counter'>$counter</a></li>";
            }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?p=notice&page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?p=notice&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
        echo "<li><a href='?p=notice&page_no=1'>1</a></li>";
        echo "<li><a href='?p=notice&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=notice&page_no=$counter'>$counter</a></li>";
            }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?p=notice&page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?p=notice&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    } else {
        echo "<li><a href='?p=notice&page_no=1'>1</a></li>";
        echo "<li><a href='?p=notice&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=notice&page_no=$counter'>$counter</a></li>";
            }
        }
    }
}
?>

            <li <?php if ($page_no >= $total_no_of_pages) {echo "class='disabled'";}?>>
                <a <?php if ($page_no < $total_no_of_pages) {echo "href='?p=notice&page_no=$next_page'";}?>>Next</a>
            </li>
            <?php if ($page_no < $total_no_of_pages) {
    echo "<li><a href='?p=notice&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
}?>
        </ul>

    </div>