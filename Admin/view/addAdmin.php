<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <form class="user" action="<?php echo $base_url . "?p=home&a=addAdmin"; ?>" method="POST"
                enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="" value="" name="name" required
                            placeholder="Name">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="" value="" name="username"
                            required placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="" name="email" required value=""
                        placeholder=" Email Address">
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
                        <input type="number" class="form-control form-control-user" id="" name="mblno" required value=""
                            placeholder="Mobile No">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">User Type</label>
                    <select class="form-control" name="type" id="exampleFormControlSelect1">
                        <option value="Administration">Administration</option>
                        <option value="Normal">Normal</option>
                    </select>
                </div>
        </div>
         <input type="submit" value="Add Admin" class="btn btn-primary btn-user btn-block">
        </form>
    </div>
</div> 