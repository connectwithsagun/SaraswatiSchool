<div class="emp-profile">
    <div class="row">
        <div class="col-md-3">
            <div class="profile-img">
                <img src="<?php echo $_SESSION['admin']['image']; ?>" alt="" />

                <div class="mb-3">
                </div>

                <a href="<?php echo $base_url . "?p=home&a=viewProfile"; ?>"><input type="submit"
                        class="profile-edit-btn btn btn-warning mb-3" name="btnAddMore" value="View Profile" /></a><br>
            </div>

        </div>
        <div class="col-md-9">
            <form class="user" action="<?php echo $base_url . "?p=home&a=updateProfile"; ?>" method="POST"
                enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id=""
                            value="<?php echo $_SESSION['admin']['name']; ?>" name="name" required placeholder="Name">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id=""
                            value=<?php echo $_SESSION['admin']['user_name']; ?> name="username" required
                            placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="" name="email" required
                        value="<?php echo $_SESSION['admin']['email']; ?>" placeholder=" Email Address">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="" name="pass" required
                            placeholder="Password">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="" name="cpass" required
                            placeholder="Repeat Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control form-control-user" id="" name="mblno" required
                            value="<?php echo $_SESSION['admin']['phone']; ?>" placeholder="Mobile No">
                    </div>

                    <div class="col-sm-6 file-upload">
                        <input type="file" class="form-control-file form-control-user"
                            value="sdc" id="" name="img">
                    </div>
                </div>
                <input type="submit" value="Update Profile" class="btn btn-primary btn-user btn-block">
            </form>
        </div>


    </div>