<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Upvex - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/bo/images/favicon.ico'); ?>">

    <!-- App css -->
    <link href="<?php echo base_url('assets/bo/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/bo/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/bo/css/app.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />


</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="alert ">
                    </div>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="index.html">
                                    <span><img src="<?php echo base_url('assets/bo/images/logo-dark.png'); ?>" alt="" height="26"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                            </div>

                            <h5 class="auth-title">Sign In</h5>
                            <div class="show_error" style="color:red"></div>
                            <form id="submit_form" method="POST" action="<?php echo base_url('back_office/login/cek') ?>" class="parsley-login">
                                <div class="form-group">
                                    <label for="username">Username<span class="text-danger">*</span></label>
                                    <input type="text" name="username" parsley-trigger="change" required placeholder="Enter username" class="form-control" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password<span class="text-danger">*</span></label>
                                    <input id="password" name="password" type="password" placeholder="Enter Password" required class="form-control">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-danger btn-block" type="submit"> Log In </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        2019 &copy; Upvex theme by <a href="" class="text-muted">Coderthemes</a>
    </footer>

    <!-- Vendor js -->
    <script src="<?php echo base_url('assets/bo/js/vendor.min.js'); ?>"></script>

    <!-- App js -->
    <script src="<?php echo base_url('assets/bo/js/app.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/bo/libs/parsleyjs/parsley.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>

</html>
<script type="text/javascript">
    $(".parsley-login").parsley();
    var status = "<?php $value = isset($STATUS) ? $STATUS : "";
                    echo $value; ?>";
    var message = "<?php $value = isset($MESSAGE) ? $MESSAGE : "";
                    echo $value; ?>";
    if (status == "gagal") {
        toastr.error(message,'',{"positionClass": "toast-top-center"});
    }
</script>