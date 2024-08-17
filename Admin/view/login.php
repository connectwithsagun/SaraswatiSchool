



<body class="primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center loginpadding">

                            <div class="col-lg-8">
                                <div class="p-5 customecenter">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
   <?php
if (hasFlash('message')) {
    $falshError = getFlash('message');
    foreach ($falshError as $fe) {
        ?>
             <div class="alert alert-<?php echo $fe['type']; ?> alert-dismissible fade show" role="alert">
                 <?php echo empty($fe['title']) ? '' : "<strong>" . $fe['title'] . "</strong> ";
echo $fe['body'];?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <?php }}?>
                                    <div class="my-2"></div>
                                    <form class="user" method="post" action="<?php ?>">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                placeholder="Enter Email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" placeholder="Password">
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="?p=fpass&a=checkemail">Forgot Password?</a>
                                    </div>