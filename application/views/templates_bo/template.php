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
        <link rel="shortcut icon" href="<?php echo base_url('assets/bo/images/favicon.ico');?>">

        <!-- plugin css -->
        <link href="<?php echo base_url('assets/bo/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css');?>" rel="stylesheet" type="text/css" />

        <!-- third party css -->
        <link href="<?php echo base_url('assets/bo/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="<?php echo base_url('assets/bo/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/css/app.min.css');?>" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <?php echo $_header; ?>

            <?php echo $_sidebar; ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <?php echo $_content; ?>

            <?php echo $_footer; ?>



            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/bo/js/vendor.min.js');?>"></script>

        <!-- Third Party js-->
        <script src="<?php echo base_url('assets/bo/libs/peity/jquery.peity.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/apexcharts/apexcharts.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/jquery-vectormap/jquery-jvectormap-us-merc-en.js');?>"></script>
        
        <script src="<?php echo base_url('assets/bo/libs/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/dataTables.bootstrap4.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/dataTables.responsive.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/responsive.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/dataTables.select.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/pdfmake/pdfmake.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/pdfmake/vfs_fonts.js');?>"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url('assets/bo/js/pages/dashboard-1.init.js');?>"></script>

        <!-- Datatables init -->
        <script src="<?php echo base_url('assets/bo/js/pages/datatables.init.js');?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets/bo/js/app.min.js');?>"></script>
    </body>
</html>
<?php echo $_globaljs; ?>
