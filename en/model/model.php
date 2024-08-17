<?php

function db_connect()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "saraswati";
    $conxn = mysqli_connect($host, $username, $password, $database) or die(mysqli_error($conxn));

    // Check connection
    if ($conxn->connect_error) {
        die("Connection failed: " . $conxn->connect_error);
    }
    return $conxn;
}

function getEvents()
{
    $conxn = db_connect();
    $events = array();
    $sql = "SELECT * FROM tbl_events WHERE status='1'  ORDER BY id Desc Limit 5";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($events, $row);
        }

        return $events;
    } else {
        return $events;
    }
}
function getNews()
{
    $conxn = db_connect();
    $news = array();
    $sql = "SELECT * FROM tbl_news WHERE status='1' ORDER BY id Desc Limit 5";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($news, $row);
        }

        return $news;
    } else {
        return $news;
    }
}
function getNotice()
{
    $conxn = db_connect();
    $notice = array();
    $sql = "SELECT * FROM tbl_notice WHERE status='1' ORDER BY id Desc Limit 5";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($notice, $row);
        }

        return $notice;
    } else {
        return $notice;
    }
}

function getEventList()
{
    $conxn = db_connect();
    $eventList = array();
    $sql = "SELECT * FROM tbl_events WHERE status='1'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($eventList, $row);
        }
        return $eventList;
    } else {
        return false;
    }
}

function getEventDetails($id)
{
    $conxn = db_connect();
    $sql = "SELECT * FROM tbl_events WHERE id='$id'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function getRecentEvents()
{
    $conxn = db_connect();
    $recentEvent = array();

    $sql = "SELECT * FROM tbl_events WHERE status='1' ORDER BY id DESC LIMIT 12";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($recentEvent, $row);
        }

        return $recentEvent;
    } else {
        return false;
    }
}
function countDonors()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_donors WHERE status ='1'";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}
function countGallery()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_gallery  join tbl_gallery_images on tbl_gallery.gid = tbl_gallery_images.gid WHERE tbl_gallery.status= '1' and tbl_gallery_images.status='1'";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function GetGallery($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $events = array();

    $sql = "Select * FROM tbl_gallery join tbl_gallery_images on tbl_gallery.gid = tbl_gallery_images.gid WHERE tbl_gallery.status= '1' and tbl_gallery_images.status='1' LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($events, $row);
        }

        return $events;
    } else {
        return false;
    }
}

function getDonorsList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $events = array();
    $sql = "SELECT * FROM tbl_donors WHERE status= '1' LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($events, $row);
        }

        return $events;
    } else {
        return false;
    }
}

function countEvent()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_events WHERE status ='1'";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getEventsList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $events = array();
    $sql = "SELECT * FROM tbl_events WHERE status= '1' LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($events, $row);
        }

        return $events;
    } else {
        return false;
    }
}
function getRecentGallery()
{
    $conxn = db_connect();
    $gallery = array();
    $sql = "SELECT * FROM tbl_gallery_images WHERE status='1' ORDER BY gid DESC limit 3";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($gallery, $row);
        }

        return $gallery;
    } else {
        return false;
    }
}

function getNewsDetails($id)
{
    $conxn = db_connect();
    $sql = "SELECT * FROM tbl_news WHERE id='$id'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function getRecentNews()
{
    $conxn = db_connect();
    $recentNews = array();
    $sql = "SELECT * FROM tbl_news WHERE status='1' ORDER BY id Desc Limit 3";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($recentNews, $row);
        }

        return $recentNews;
    } else {
        return false;
    }
}

function getNoticeDetails($id)
{
    $conxn = db_connect();
    $sql = "SELECT * FROM tbl_notice WHERE id='$id'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function countNews()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_news WHERE status ='1'";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getNewsList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $news = array();
    $sql = "SELECT * FROM tbl_news WHERE status= '1' LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($news, $row);
        }

        return $news;
    } else {
        return false;
    }
}

function getRecentNotice()
{
    $conxn = db_connect();
    $notice = array();
    $sql = "SELECT * FROM tbl_notice WHERE status='1' ORDER BY id Desc Limit 3";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($notice, $row);
        }

        return $notice;
    } else {
        return false;
    }
}
function countnotice()
{
    $conxn = db_connect();

    $sql = "SELECT COUNT(*) As total_records FROM tbl_notice WHERE status ='1'";
    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getNoticeList($offset, $total_records_per_page)
{
    $conxn = db_connect();
    $notice = array();
    $sql = "SELECT * FROM tbl_notice WHERE status= '1' LIMIT $offset, $total_records_per_page";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($notice, $row);
        }

        return $notice;
    } else {
        return false;
    }
}
function countTodayDonors()
{
    $conxn = db_connect();
    $date = date("Y-m-d");

    $sql = "SELECT COUNT(*) As total_records FROM tbl_donors WHERE status ='1' and date='$date'";

    $result_count = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $total_records = mysqli_fetch_array($result_count);
    return $total_records['total_records'];
}

function getTodayDonors()
{
    $date = date("Y-m-d");

    $conxn = db_connect();
    $events = array();
    $sql = "SELECT * FROM tbl_donors WHERE status= '1' and date='$date'";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($events, $row);
        }

        return $events;
    } else {
        return false;
    }
}

function getContact()
{
    $conxn = db_connect();

    $sql = "SELECT * FROM tbl_contact";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        return $row;
    } else {
        return false;
    }
}
function countAllDonors()
{
    $conxn = db_connect();

    $sql = "SELECT * FROM tbl_donors";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $num_rows = mysqli_num_rows($result);

    mysqli_close($conxn);
    return $num_rows;
}

function getSlider()
{
    $conxn = db_connect();
    $slider = array();
    $sql = "SELECT * FROM tbl_slider WHERE status='1'";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($slider, $row);
        }
        return $slider;
    } else {
        return false;
    }
}
function getLastIDForSlider()
{
    $conxn = db_connect();

    $sql = "SELECT id FROM tbl_slider ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
    }

    mysqli_close($conxn);
    return $row['id'];
}

function getUpdate()
{
    $conxn = db_connect();
    $latest = array();

    $sql = "Select * FROM tbl_latest_update join tbl_latest_update_images on tbl_latest_update.lid = tbl_latest_update_images.lid WHERE tbl_latest_update.status= '1' and tbl_latest_update_images.status='1' ";

    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    mysqli_close($conxn);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($latest, $row);
        }

        return $latest;
    } else {
        return false;
    }
}
function contact_us($name, $email, $phone, $msg)
{
    $conxn = db_connect();

    $sql = "INSERT INTO tbl_contact_us (name,email,phone,message) VALUES ('$name','$email','$phone','$msg')";
    $result = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
    $affRows = mysqli_affected_rows($conxn);
    mysqli_close($conxn);
    if ($affRows > 0) {
        return true;
    } else {
        return false;
    }
}
