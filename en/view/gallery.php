<!-- Latest Gallery -->
<div class="container-fluid latest-gallery">
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
$total_records = countGallery();
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total page minus 1

$gallery = GetGallery($offset, $total_records_per_page);
?>
    <div class="container">
        <div class="display-4 text-center">Our Latest Gallery</div>
        <div class="row mt-4">
           <?php if (empty($gallery)) {
    echo "No Gallery Founds";
} else {

    foreach ($gallery as $result) {?>

            <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                <a href="<?php echo '../Admin/' . $result['imagename']; ?>" data-lightbox="example-set" data-title="">
                    <img src="../Admin/<?php echo $result['imagename']; ?>" width="320px" height="240px"
                        class="card-img-top img-responsive zoom-img" alt="img">
                </a>
            </div>

            <?php }?>
        </div>


            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
            </div>
<div class="bav">
            <ul class="pagination site-pagination">
                <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                <li <?php if ($page_no <= 1) {echo "class='disabled'";}?>>
                    <a <?php if ($page_no > 1) {echo "href='?p=gallery&page_no=$previous_page'";}?>>Previous</a>
                </li>

                <?php
if ($total_no_of_pages <= 10) {
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=gallery&page_no=$counter'>$counter</a></li>";
            }
        }
    } elseif ($total_no_of_pages > 10) {

        if ($page_no <= 4) {
            for ($counter = 1; $counter < 8; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='active'><a>$counter</a></li>";
                } else {
                    echo "<li><a href='?p=gallery&page_no=$counter'>$counter</a></li>";
                }
            }
            echo "<li><a>...</a></li>";
            echo "<li><a href='?p=gallery&page_no=$second_last'>$second_last</a></li>";
            echo "<li><a href='?p=gallery&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
            echo "<li><a href='?p=gallery&page_no=1'>1</a></li>";
            echo "<li><a href='?p=gallery&page_no=2'>2</a></li>";
            echo "<li><a>...</a></li>";
            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='active'><a>$counter</a></li>";
                } else {
                    echo "<li><a href='?p=gallery&page_no=$counter'>$counter</a></li>";
                }
            }
            echo "<li><a>...</a></li>";
            echo "<li><a href='?p=gallery&page_no=$second_last'>$second_last</a></li>";
            echo "<li><a href='?p=gallery&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        } else {
            echo "<li><a href='?p=gallery&page_no=1'>1</a></li>";
            echo "<li><a href='?p=gallery&page_no=2'>2</a></li>";
            echo "<li><a>...</a></li>";

            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='active'><a>$counter</a></li>";
                } else {
                    echo "<li><a href='?p=gallery&page_no=$counter'>$counter</a></li>";
                }
            }
        }
    }
    ?>

                <li <?php if ($page_no >= $total_no_of_pages) {echo "class='disabled'";}?>>
                    <a <?php if ($page_no < $total_no_of_pages) {echo "href='?p=gallery&page_no=$next_page'";}?>>Next</a>
                </li>
                <?php if ($page_no < $total_no_of_pages) {
        echo "<li><a href='?p=gallery&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    }?>
            </ul>
</div>
            <?php }?>
        </div>
    </div>
</div>