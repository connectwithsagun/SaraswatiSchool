<div class="container ">
    <h3 class="text-center mt-5 ">Set New Password</h3>
    <p class="text-center "> <?php
echo "Enter your email";
?> </p>
    <hr width="300px " style="border:1px solid red; ">
    <div class="mt-5">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <?php
if (hasFlash('message')) {
    $falshError = getFlash('message');
    foreach ($falshError as $fe) {
        ?>
                <div class="alert alert-<?php echo $fe['type']; ?> alert-dismissible fade show" role="alert">
                    <?php echo empty($fe['title']) ? '' : "<strong>" . $fe['title'] . "</strong> ";
        echo $fe['body']; ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php }}?>
            </div>
        </div>
        <div class="form-group col-md-4">
        </div>

        <form action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-4">
                 <label>Password</label>
                    <input type="password" name="pass" class="form-control" id="inputEmail4" required
                        placeholder="">
                </div>
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-4">
                 <label>Confirm Password</label>
                    <input type="password" name="cpass" class="form-control" id="inputEmail4" required
                        placeholder="">
                </div>
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-0.1">
                    <input type="submit" class="btn btn-prime btn-lg" value="Set Password" />
                </div>
                <div class="form-group col-md-4"> <a href="?p=login" class="btn btn-prime btn-lg">
                        Login</a>
                </div>
                <div class="form-group col-md-4">
                </div>
            </div>
        </form>
    </div>
</div>