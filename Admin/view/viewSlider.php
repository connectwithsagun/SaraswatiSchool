
<?php
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
$total_records_per_page = 10;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$total_records = countSlider();
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total page minus 1

$slider = getSliderList($offset, $total_records_per_page);
?>



<div class="table-responsive-md table-responsive-sm table-responsive-lg">
<table class="table">
    <thead class="thead-dark">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Slider Title</th>
            <th scope="col">Descriptions</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody> 
        <?php

if ($slider) {
    foreach ($slider as $result) {
        ?>

        <tr>
            <th scope="row"><?php echo $result['id']; ?></th>
            <td><?php echo $result['title']; ?></td>
            <td><?php echo $result['description']; ?></td>
            <td><img src="<?php echo $result['image']; ?>" width="70px" height="70px"></td>
            <td><a href="<?php echo $base_url . "?p=home&a=viewSlider&id=" . $result['id'] . "&type=" . $result['status']; ?>
" onclick="return confirm('Do you want to change?');"><?php if ($result['status'] == '1') {echo '<span class="badge badge-primary">Active</span>';} else {echo '<span class="badge badge-secondary">Inactive</span>';}
    ;?></a></td>
             <td>
                <a href="<?php echo $base_url . "?p=home&a=editSlider&id=" . $result['id']; ?>">
                    <i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                    &nbsp 
                <a href="<?php echo $base_url . "?p=home&a=deleteSlider&id=" . $result['id']. "&img=" . $result['image']; ?>" onClick="return confirm('Are you absolutely sure you want to delete?')" >
                        <i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>

        </tr>
        <?php
}
} else {
    ?>
        <tr>
            <td>No Records Found</td>
        </tr>
        <?php
}
?>
    </tbody>
</table>



<ul class="pagination">
                            <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                            <li <?php if ($page_no <= 1) {echo "class='disabled'";}?>>
                                <a
                                    <?php if ($page_no > 1) {echo "href='?p=home&a=viewSlider&page_no=$previous_page'";}?>>Previous</a>
                            </li>

                            <?php
if ($total_no_of_pages <= 10) {
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
        if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";
        } else {
            echo "<li><a href='?p=home&a=viewSlider&page_no=$counter'>$counter</a></li>";
        }
    }
} elseif ($total_no_of_pages > 10) {

    if ($page_no <= 4) {
        for ($counter = 1; $counter < 8; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=home&a=viewSlider&page_no=$counter'>$counter</a></li>";
            }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?p=home&a=viewSlider&page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?p=home&a=viewSlider&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
        echo "<li><a href='?p=home&a=viewSlider&page_no=1'>1</a></li>";
        echo "<li><a href='?p=home&a=viewSlider&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=home&a=viewSlider&page_no=$counter'>$counter</a></li>";
            }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?p=home&a=viewSlider&page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?p=home&a=viewSlider&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    } else {
        echo "<li><a href='?p=home&a=viewSlider&page_no=1'>1</a></li>";
        echo "<li><a href='?p=home&a=viewSlider&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=home&a=viewSlider&page_no=$counter'>$counter</a></li>";
            }
        }
    }
}
?>

                            <li <?php if ($page_no >= $total_no_of_pages) {echo "class='disabled'";}?>>
                                <a
                                    <?php if ($page_no < $total_no_of_pages) {echo "href='?p=home&a=viewSlider&page_no=$next_page'";}?>>Next</a>
                            </li>
                            <?php if ($page_no < $total_no_of_pages) {
    echo "<li><a href='?p=home&a=viewSlider&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
}?>
                        </ul>