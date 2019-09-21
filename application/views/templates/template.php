<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> <?php echo $title;?> </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico');?>">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap.min.css');?>">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/ionicons.min.css');?>">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/slick.cs');?>s">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/animation.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/jqueryui.min.css');?>">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="<?php echo base_url('assets/js/vendor/vendor.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/plugins.min.js');?>"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <!--<link rel="stylesheet" href="<?php echo base_url('assets/css/style.min.css');?>">-->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script> -->
    <!-- jQuery JS -->
    <script src="<?php echo base_url('assets/js/vendor/jquery-3.3.1.min.js');?>"></script>
    <!-- tambahan -->
    <script src="<?php echo base_url('assets/js/jquery-3.4.1.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    

    <style>
    .ml-50{
        margin-left: 50%;
    }
    .alamat-view{
        font-size: 13px;
        line-height: 13px;
    }
    .fz-12{
        font-size: 12px !important;
    }

    .fz-14{
        font-size: 14px;
    }
    .select2-container {
        width: 100% !important;
    }
    .page-link{
        padding:6px;
    }
    </style>

</head>

<body class="fz-14">

    <div class="main-wrapper">
        <?php echo $_header;?>
            <div id="reload-content" class="fz-12">
                <?php echo $_content;?>
            </div>
        <?php echo $_footer;?>
    </div>

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="<?php echo base_url('assets/js/vendor/modernizr-3.6.0.min.js');?>"></script>
    
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/vendor/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/bootstrap.min.js');?>"></script>

    <!-- Slick Slider JS -->
    <script src="<?php echo base_url('assets/js/plugins/slick.min.js');?>"></script>
    <!--  Jquery ui JS -->
    <script src="<?php echo base_url('assets/js/plugins/jqueryui.min.js');?>"></script>
    <!--  Scrollup JS -->
    <script src="<?php echo base_url('assets/js/plugins/scrollup.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/ajax-contact.js');?>"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="<?php echo base_url('assets/js/vendor/vendor.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/plugins.min.js');?>"></script>
-->

    <!-- Main JS -->
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <!-- load global -->
    
    <script src="<?php echo base_url('assets/js/global.js');?>" type="text/javascript"></script>

</body>

</html>