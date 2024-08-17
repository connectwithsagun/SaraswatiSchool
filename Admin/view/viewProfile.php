<div class="emp-profile">
    <div class="row">
        <div class="col-md-3">
            <div class="profile-img">
                <img src="<?php echo $_SESSION['admin']['image']; ?>" alt="cannot load image" />

                <div class="mb-3">
                </div>

                <a href="<?php echo $base_url . "?p=home&a=updateProfile"; ?>"><input type="submit"
                        class="profile-edit-btn btn btn-warning mb-3" name="btnAddMore" value="Update Profile" /></a>

            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-head">
                <h5>
                    <?php echo $_SESSION['admin']['name']; ?>
                </h5>
                <p class="proile-rating">Type : <span> <?php echo $_SESSION['admin']['type']; ?></span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">About</a>
                    </li>
                   
                </ul>
            </div>

            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">

                        <div class="col-md-4">

                            <label>User Id</label>
                        </div>
                        <div class="col-md-4">

                            <p> <?php echo $_SESSION['admin']['user_id']; ?></p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-4">
                            <p> <?php echo $_SESSION['admin']['user_name']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Name</label>
                        </div>
                        <div class="col-md-4">
                            <p> <?php echo $_SESSION['admin']['name']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">

                            <label>Email</label>
                        </div>
                        <div class="col-md-4">
                            <p> <?php echo $_SESSION['admin']['email']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-4">
                            <p> <?php echo $_SESSION['admin']['phone']; ?></p>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                       <!-- <div class="col-md-4">

                            <label>Experience</label>
                        </div>
                        <div class="col-md-4">

                            <p>Expert</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Hourly Rate</label>
                        </div>
                        <div class="col-md-4">
                            <p>10$/hr</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Total Projects</label>
                        </div>
                        <div class="col-md-4">
                            <p>230</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>English Level</label>
                        </div>
                        <div class="col-md-4">
                            <p>Expert</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Availability</label>
                        </div>
                        <div class="col-md-4">
                            <p>6 months</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Your Bio</label><br />
                            <p>Your detail description</p>
                        </div>
                    </div>
-->
                </div>
            </div>

        </div>

    </div>


</div>