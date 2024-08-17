<?php 
ob_start();
include 'helper/adminSessionHelper.php';
include 'helper/FlashMessageHelper.php';
include 'view/headerforhome.php';
include 'view/nav.php';

if (isset($_GET['a'])) {
    
    $action = $_GET['a'];
   
    switch ($action) {
        case 'addAdmin':
            include 'controller/AdminController.php';
            break;
        case 'viewAdmin':
            include 'controller/AdminController.php';
            break;
        case 'deleteAdmin':
            include 'controller/AdminController.php';
            break;
        case 'viewProfile':
            include 'controller/ProfileController.php';
            break;
        case 'updateProfile':
            include 'controller/ProfileController.php';
            break;
        case 'viewTestimonials':
            include 'controller/TestimonialsController.php';
            break;
        case 'deleteTestimonials':
            include 'controller/TestimonialsController.php';
            break;
        case 'addNotices':
            include 'controller/NoticeController.php';
            break;
        case 'viewNotices':
            include 'controller/NoticeController.php';
            break;
        case 'deleteNotices':
            include 'controller/NoticeController.php';
            break;
        case 'editNotices':
            include 'controller/NoticeController.php';
            break;
        case 'addEvents':
            include 'controller/EventsController.php';
            break;
        case 'viewEvents':
            include 'controller/EventsController.php';
            break;
        case 'deleteEvents':
            include 'controller/EventsController.php';
            break;
        case 'editEvents':
            include 'controller/EventsController.php';
            break;
        case 'addNews':
            include 'controller/NewsController.php';
            break;
        case 'viewNews':
            include 'controller/NewsController.php';
            break;
        case 'editNews':
            include 'controller/NewsController.php';
            break;
        case 'deleteNews':
            include 'controller/NewsController.php';
            break;
        case 'addGallery':
            include 'controller/GalleryController.php';
            break;
        case 'viewGallery':
            include 'controller/GalleryController.php';
            break;
        case 'editGallery':
            include 'controller/GalleryController.php';
            break;
        case 'deleteGallery':
            include 'controller/GalleryController.php';
            break;
        case 'viewImages':
            include 'controller/GalleryController.php';
            break;
        case 'deleteImage':
            include 'controller/GalleryController.php';
            break;
        case 'addSlider':
            include 'controller/SliderController.php';
            break;
        case 'deleteSlider':
            include 'controller/SliderController.php';
            break;
        case 'editSlider':
            include 'controller/SliderController.php';
            break;
        case 'viewSlider':
            include 'controller/SliderController.php';
            break;
        case 'addMember':
            include 'controller/MemberController.php';
            break;
        case 'deleteMember':
            include 'controller/MemberController.php';
            break;
        case 'editMember':
            include 'controller/MemberController.php';
            break;
        case 'viewMember':
            include 'controller/MemberController.php';
            break;
        case 'addDonor':
            include 'controller/DonorController.php';
            break;
        case 'deleteDonor':
            include 'controller/DonorController.php';
            break;
        case 'editDonor':
            include 'controller/DonorController.php';
            break;
        case 'viewDonor':
            include 'controller/DonorController.php';
            break;
        case 'editContact':
            include 'controller/ContactController.php';
            break;
        case 'latestUpdate':
            include 'controller/UpdateController.php';
            break;
        case 'addUpdate':
            include 'controller/UpdateController.php';
            break;
        case 'viewUpdate':
            include 'controller/UpdateController.php';
            break;
        case 'viewUpdateImages':
            include 'controller/UpdateController.php';
            break;
        case 'editLatestUpdate':
            include 'controller/UpdateController.php';
            break;
        case 'deleteLatestUpdate':
            include 'controller/UpdateController.php';
            break;
        case 'deleteUpdateImage':
            include 'controller/UpdateController.php';
            break;
        case 'viewMessage':
            include 'controller/MessageController.php';
            break;
        default:
            // throwError(404, 'Requested page does not exists.');
            break;

    }
    include 'view/footer.php';
    return;
} else {
  

}
include 'view/footer.php';
ob_end_flush();