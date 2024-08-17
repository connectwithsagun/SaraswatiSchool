<?php
date_default_timezone_set('UTC');
error_reporting(0);
include 'helper/ErrorHelper.php';
include 'view/header.php';


include 'view/nav.php';
include 'model/model.php';

if (isset($_GET['p'])) {
    $controller = $_GET['p'];
    switch ($controller) {
        case 'home':
            include 'controller/HomeController.php';
            break;
        case 'donors':
            include 'controller/DonorsController.php';
            break;
        case 'events':
            include 'controller/EventController.php';
            break;
        case 'gallery':
            include 'controller/GalleryController.php';
            break;
        case 'eventDetails':
            include 'controller/EventController.php';
            break;
        case 'news':
            include 'controller/NewsController.php';
            break;
        case 'newsDetails':
            include 'controller/NewsController.php';
            break;
        case 'notice':
            include 'controller/NoticeController.php';
            break;
        case 'noticeDetails':
            include 'controller/NoticeController.php';
            break;
        case 'contact':
            include 'controller/ContactController.php';
            break;
        case 'TopDonors':
            include 'controller/DonorsController.php';
            break;
        case 'TodayDonors':
            include 'controller/DonorsController.php';
            break;
        case 'management':
            include 'controller/ManagementController.php';
            break;
        case 'education':
            include 'controller/EducationController.php';
            break;
        case 'pre-primary':
            include 'controller/PrePrimaryController.php';
            break;
        case 'primary':
            include 'controller/PrimaryController.php';
            break;
        case 'secondary':
            include 'controller/SecondaryController.php';
            break;
        case 'org-structure':
            include 'controller/OrganizationalStructureController.php';
            break;
        case 'smc':
            include 'controller/SmcController.php';
            break;
        case 'history':
            include 'controller/HistoryController.php';
            break;
        case 'staff':
            include 'controller/StaffController.php';
            break;
        default:
            include 'controller/HomeController.php';

            //     include 'view/errorpage.php';
            // throwError(404, 'Requested page does not exists.');
            break;
        case 'about':
            include 'controller/AboutusController.php';
            break;
    }
} else {
    include 'controller/HomeController.php';
}

include 'view/footer.php';
