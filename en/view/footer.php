<div class="container top-footer">
    <div class="container mt-5 mb-5">
        <div class="row">
           <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                   <h4>Like Us</h4>
                <div class="fb-page"
                data-href="https://www.facebook.com/Saraswati.Secondary.School"
         data-tabs="timeline"
         data-width=""
         data-height="400"
         data-small-header="false"
         data-adapt-container-width="true"
         data-hide-cover="false"
         data-show-facepile="true">
         <blockquote
            cite="https://www.facebook.com/Saraswati.Secondary.School"
            class="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/Saraswati.Secondary.School">Saraswati Secondary School</a>
        </blockquote>
                </div>
            </div>
             <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                <h4>Quick Link</h4>
                <ul>

                    <li><i class="fa fa-angle-right"></i> <a href="?p=home">Home</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="?p=events">Events</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="?p=gallery">Gallery</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="?p=donors">Donors</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="?p=contact">Contact Us</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="?p=about">About Us</a></li>

                </ul>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                <h4>Contact Details:</h4>
                <?php $contact = getContact();
?>
                <p>
                    <span class="fa  fa-map-marker" aria-hidden="true"></span> <?php echo $contact['address']; ?>
                </p>
                <p>
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                    <a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a>
                </p>
                <p>
                    <span class="fa fa-phone" aria-hidden="true"> </span> <?php echo $contact['phoneno']; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">&copy; <?php echo date("Y"); ?> Sagun Pangeni. All rights reserved </div>
</footer>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="resource/js/lightbox-plus-jquery.min.js"> </script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="resource/js/bootstrap.min.js"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0">
</script>
</body>

</html>