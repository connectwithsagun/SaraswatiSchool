<?php
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
$total_records_per_page = 25;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$total_records = countDonors();
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total page minus 1

$donors = getDonorsList($offset, $total_records_per_page);
$todasDonors = getTodayDonors();
?><div class="cointainer-fluid donors p-5">
    <div class="container">
        <h1 class="display-4 text-center">Donors List <button type="button" class="btn btn-primary">
                Total Donors <span class="badge badge-light"><?php echo countAllDonors(); ?></span>
            </button></h1>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link <?php if ($_GET['p'] == "donors") {echo "active";}?>" id="all-donor-tab"
                    data-toggle="tab" href="#all-donor" role="tab" aria-controls="all-donor" aria-selected="true"
                    href="?p=donors">Recent Donors</a>
                <a class="nav-item nav-link <?php if ($_GET['p'] == "TodayDonors") {echo "active";}?>"
                    id="today-donor-tab" data-toggle="tab" href="#today-donor" role="tab" aria-controls="today-donor"
                    aria-selected="false" href="?p=TodayDonors">Today
                    Donors</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="all-donor" role="tabpanel" aria-labelledby="all-donor-tab">
                <?php if (empty($donors)) {
    echo "<p class='mt-3'>No Donors Founds<p>";
} else {?> <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
foreach ($donors as $result) {?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['address']; ?></td>
                            <td><?php echo $result['amount']; ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>

                <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                    <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
                </div>

                <ul class="pagination ">
                    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                    <li <?php if ($page_no <= 1) {echo "class='disabled'";}?>>
                        <a <?php if ($page_no > 1) {echo "href='?p=donors&page_no=$previous_page'";}?>>Previous</a>
                    </li>

                    <?php
if ($total_no_of_pages <= 10) {
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
        if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";
        } else {
            echo "<li><a href='?p=donors&page_no=$counter'>$counter</a></li>";
        }
    }
} elseif ($total_no_of_pages > 10) {

    if ($page_no <= 4) {
        for ($counter = 1; $counter < 8; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=donors&page_no=$counter'>$counter</a></li>";
            }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?p=donors&page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?p=donors&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
        echo "<li><a href='?p=donors&page_no=1'>1</a></li>";
        echo "<li><a href='?p=donors&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=donors&page_no=$counter'>$counter</a></li>";
            }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?p=donors&page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?p=donors&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    } else {
        echo "<li><a href='?p=donors&page_no=1'>1</a></li>";
        echo "<li><a href='?p=donors&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";
            } else {
                echo "<li><a href='?p=donors&page_no=$counter'>$counter</a></li>";
            }
        }
    }
}
    ?>

                    <li <?php if ($page_no >= $total_no_of_pages) {echo "class='disabled'";}?>>
                        <a
                            <?php if ($page_no < $total_no_of_pages) {echo "href='?p=donors&page_no=$next_page'";}?>>Next</a>
                    </li>
                    <?php if ($page_no < $total_no_of_pages) {
        echo "<li><a href='?p=donors&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    }?>
                </ul>
                <?php }?>
            </div>
            <div class="tab-pane fade" id="today-donor" role="tabpanel" aria-labelledby="today-donor-tab">
                <?php if (empty($todasDonors)) {
    echo "No Donors Founds";
} else {?> <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
foreach ($donors as $result) {?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['address']; ?></td>
                            <td><?php echo $result['amount']; ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php }?>
            </div>
        </div>

        <!-- pagination -->


    </div>

</div>