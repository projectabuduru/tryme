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

        <!-- third party css -->
        <link href="<?php echo base_url('assets/bo/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- Plugins css -->
        <link href="<?php echo base_url('assets/bo/libs/select2/select2.min.css');?>" rel="stylesheet" type="text/css" />

         <!-- Sweet Alert-->
         <link href="<?php echo base_url('assets/bo/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?php echo base_url('assets/bo/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bo/css/app.min.css');?>" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php echo $header; ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php echo $sidebar; ?>            
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Data Product</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Data Master Product</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-success waves-effect waves-light" onclick="tambah()" data-toggle="modal">Create</button><br><br>
                                        <table id="product_datatable" class="table dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kategori</th>
                                                    <th>Harga Produk</th>
                                                    <th>Harga Produk Sales</th>
                                                    <th>Stok</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

            <!-- Footer Start -->
            <?php echo $footer; ?>            
            <!-- end Footer -->
        </div>
        <!-- END wrapper -->
        <div id="modal"></div>

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/bo/js/vendor.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/select2/select2.min.js');?>"></script>


        <!-- third party js -->
        <script src="<?php echo base_url('assets/bo/libs/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/dataTables.bootstrap4.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/dataTables.responsive.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/pdfmake/pdfmake.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/pdfmake/vfs_fonts.js');?>"></script>
        <!-- third party js ends -->

        <!-- Sweet Alerts js -->
        <script src="<?php echo base_url('assets/bo/libs/sweetalert2/sweetalert2.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bo/libs/parsleyjs/parsley.min.js'); ?>"></script>

        <!-- Datatables init -->
        <script src="<?php echo base_url('assets/bo/js/pages/datatables.init.js'); ?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets/bo/js/app.min.js');?>"></script>
        
    </body>
</html>
<script type="text/javascript">
    
$(document).ready(function () {
    var urll = "<?php echo base_url('back_office/Product/get_all_product'); ?>";
    var tabel = $('#product_datatable').DataTable({
        ajax: {
            "url": urll,
            "type": "POST"
        },
        language: {
			paginate: {
				previous: "<i class='mdi mdi-chevron-left'>",
				next: "<i class='mdi mdi-chevron-right'>"
			}
        },
        processing: true,
        columns: [
            {data: "no"},
            {data: "product_name"},
            {data: "cate_name"},
            {data: "product_price"},
            {data: "product_price_partner"},
            {data: "product_stok"},
            {
                "mRender": function (data, type, row) {
                    var tampil = "";
                    tampil += ' <button title="View Produk" class="view btn btn-success far fa-eye"></button>';
                    tampil += ' <button title="Edit Produk" class="edit btn btn-info fas fa-pencil-alt"><i class=""></i></button>'; 
                    tampil += ' <button title="Hapus Produk" class="hapus btn btn btn-danger fas fa-trash-alt"><i class=""></button>';
                    return tampil;
                },

            }
        ],
        columnDefs: [
            { responsivePriority: 10001 , targets: 0 },
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: -1 }
        ],
        // lengthChange: !1,
        // buttons: ["copy", "print", "pdf"],
        drawCallback: function () {
			$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
		}
    });
    $('#product_datatable tbody').on('click', '.edit', function(e){
        var data = tabel.row( $(this).parents('tr') ).data();
        simpan = "update";
        $('#modal').load("<?php echo base_url()?>back_office/product/modal_update_produk/"+data['product_id']);
    });

    $('#product_datatable tbody').on('click', '.hapus', function(e){
        var data = tabel.row( $(this).parents('tr') ).data();
        swal.fire({
            title: 'Yakin Menghapus?',
            text: "Data akan dihapus",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url: "<?php echo base_url()?>back_office/product/delete_product/" + data['product_id'],
                    type: "POST",
                    dataType: "JSON",
                    success: function (b) {
                        tabel.ajax.reload();
                    },
                    error: function (b, d, c) {
                        swal.fire("Error", "Gagal Melakukan hapus data", "error")
                    }
                });
                swal.fire("Sukses!", "Sukses Menghapus data", "success")
            }
        });
    });

    $('#product_datatable tbody').on('click', '.view', function(e){
        simpan = "view";
        var data = tabel.row( $(this).parents('tr') ).data();
        $('#modal').load("<?php echo base_url()?>back_office/product/modal_detail_product/"+data['product_id']);
    });
});
function tambah() {
    simpan = "create";
    $('#modal').load("<?php echo base_url("back_office/product/modalproduk")?>");
}
</script>














