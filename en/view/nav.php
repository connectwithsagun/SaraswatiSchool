<!-- top header -->
<div class="container-fluid">
    <div class="top-header">
        <div class="container">
            <span class="top-header__date"><?php date_default_timezone_set('Asia/Kathmandu');
                                            $date = date("F j, Y, g:i a");
                                            echo ($date);
                                            ?></span>
            <span class="top-header__language">
                <select>
                    <option>English</option>
                    <option>Nepali</option>
                </select>
            </span>
        </div>
    </div>
</div>

<!-- Main navbar -->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="?p=home"><img src="resource/images/school_logo_transparent.png" alt="" style="height: 80px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php $p = $_GET['p'];
                                    if ($p == "home") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link " href="?p=home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php $p = $_GET['p'];
                                    if ($p == "about") {
                                        echo "active";
                                    } ?>">
                    <a href="?p=about" class="nav-link">About Us</a>

                </li>
                <li
                    class="nav-item dropdown <?php $p = $_GET['p'];
                                                if ($p == "events") {
                                                    echo "active";
                                                }
                                                if ($p == "news") {
                                                    echo "active";
                                                }
                                                if ($p == "notice") {
                                                    echo "active";
                                                } ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        News & Events
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "news") {
                                                    echo "active";
                                                } ?>"
                            href="?p=news">News</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "events") {
                                                    echo "active";
                                                } ?>"
                            href="?p=events">Events</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "notice") {
                                                    echo "active";
                                                } ?>"
                            href="?p=notice">Notice</a>
                    </div>
                </li>
                <li
                    class="nav-item dropdown <?php $p = $_GET['p'];
                                                if ($p == "management") {
                                                    echo "active";
                                                }
                                                if ($p == "education") {
                                                    echo "active";
                                                }
                                                if ($p == "pre-primary") {
                                                    echo "active";
                                                }
                                                if ($p == "primary") {
                                                    echo "active";
                                                }
                                                if ($p == "secondary") {
                                                    echo "active";
                                                } ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Programs
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "management") {
                                                    echo "active";
                                                } ?>"
                            href="?p=management">Management</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "education") {
                                                    echo "active";
                                                } ?>"
                            href="?p=education">Education</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "pre-primary") {
                                                    echo "active";
                                                } ?>"
                            href="?p=pre-primary">Pre-primary</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "primary") {
                                                    echo "active";
                                                } ?>"
                            href="?p=primary">Primary</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "secondary") {
                                                    echo "active";
                                                } ?>"
                            href="?p=secondary">Secondary</a>
                    </div>
                </li>
                <!-- Program nav item end here -->

                <!-- information nav item start here -->
                <li
                    class="nav-item dropdown <?php $p = $_GET['p'];
                                                if ($p == "org-structure") {
                                                    echo "active";
                                                }
                                                if ($p == "smc") {
                                                    echo "active";
                                                }
                                                if ($p == "history") {
                                                    echo "active";
                                                }
                                                if ($p == "staff") {
                                                    echo "active";
                                                }
                                                ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Information
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "org-structure") {
                                                    echo "active";
                                                } ?>"
                            href="?p=org-structure">Education Committee</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "smc") {
                                                    echo "active";
                                                } ?>"
                            href="?p=smc">SMC</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "histoy") {
                                                    echo "active";
                                                } ?>"
                            href="?p=history">History</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php $p = $_GET['p'];
                                                if ($p == "staff") {
                                                    echo "active";
                                                } ?>"
                            href="?p=staff">Staff</a>


                    </div>
                </li>

                <!-- information nav item ends here -->
                <li class="nav-item <?php $p = $_GET['p'];
                                    if ($p == "gallery") {
                                        echo "active";
                                    } ?>">
                    <a href="?p=gallery" class="nav-link">Gallery</a>
                </li>
                <li class="nav-item <?php $p = $_GET['p'];
                                    if ($p == "contact") {
                                        echo "active";
                                    } ?>">
                    <a href="?p=contact" class="nav-link">Contact Us</a>
                </li>
                <!-- <li class="nav-item <?php $p = $_GET['p'];
                                            if ($p == "donors") {
                                                echo "active";
                                            } ?>">
                    <a href="?p=donors" class="nav-link">Donors</a>
                </li> -->

            </ul>

            <a href="?p=contact" target="_blank"> <button class="btn btn-success my-2 my-sm-0"
                    type="submit">Join Us</button>
            </a>
        </div>
    </nav>
</div>