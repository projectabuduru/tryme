<style>
    .swal-text{
        font-size:14px;
    }
    .swal-title{
        font-size:16px;
    }
</style>
<!-- ============ MODAL ADD BARANG =============== -->
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="mediumModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 50%;margin-left: 25%;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="margin-left:25%;">Tambah Alamat Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <form class="form-horizontal frm-add-alamat" method="post" action="#">
                        <div class="modal-body" style="font-size: 12px;">

                            <div class="form-group">
                                <label class="control-label col-xs-3" >Nama Alamat</label>
                                <div class="col-xs-8">
                                    <input name="alamat_nama" value="Rumah" class="form-control fz-12" type="text" placeholder="Nama Alamat" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label col-xs-3" >Nama Penerima</label>
                                        <div class="col-xs-8">
                                            <input name="user_penerima" value="<?php echo $user->user_nama;?>" class="form-control fz-12" type="text" placeholder="Nama Penerima" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="control-label col-xs-3" >Nomor HP</label>
                                        <div class="col-xs-8">
                                            <input type="text" value="<?php echo $user->user_telp;?>" class="form-control fz-12" name="user_penerima_telp" placeholder="085xxxxx">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="control-label col-xs-3" >Provinsi</label>
                                        <div class="col-xs-8">
                                            <select class="form-control province" name="alamat_provinsi_id"></select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="kota">
                                        <label class="control-label col-xs-3" >Kota</label>
                                        <div class="col-xs-8">
                                            <select class="form-control kota fz-12" name="alamat_kota_id"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" >Alamat</label>
                                <div class="col-xs-8">
                                    <textarea name="alamat" class="form-control fz-12"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-close fz-12" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info buton-add-alamat fz-12" type="button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL ADD BARANG-->


<!-- main-content-wrap start -->
<?php $this->load->view('profile/header');?>

                        <div class="col-md-12 col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane active" id="address">
                                    <h3>Alamat </h3>
                                    <div class="login-form-container">
                                        <div class="account-login-form">
                                            <div class="pull-right">
                                                <a class="btn btn-sm btn-success fz-12" style="line-height:10px;" data-toggle="modal" data-target="#modal_add_new"> Add New</a>
                                            </div>
                                                <div class="table">
                                                    <table class="table">
                                                        <thead>
                                                            <th>Penerima</th>
                                                            <th>Alamat Pengiriman</th>
                                                            <th>Daerah Pengiriman</th>
                                                            <th></th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($data as $key => $value) {
                                                                // pre($data);
                                                                echo "<tr>
                                                                        <td>
                                                                            <p><b>$value->user_penerima</b></p>
                                                                            <p>$value->user_penerima_telp</p>
                                                                        </td>
                                                                        <td>
                                                                            <p><b>$value->alamat_nama</b></p>
                                                                            <p>$value->alamat</p>
                                                                        </td>
                                                                        <td>
                                                                            <p>$value->alamat_detail</p>
                                                                            <p>$value->alamat</p>
                                                                        </td>
                                                                        <td>";
                                                                        
                                                                        if($value->status_alammat == 'Y'){
                                                                            $aktif = "<a href='javascript:void(0);' class='btn btn-success fz-12' readonly style='line-height:13px;padding:10px;' title='Alamat Utama'><i class='fa fa-check' aria-hidden='true'></i></a>
                                                                                        <a href='#' class='btn btn-default fz-12' style='line-height:13px;padding:10px;' title='Ubah Alamat'><i class='fa fa-pencil' aria-hidden='true'></i></a>";
                                                                        }else{
                                                                            $aktif = "<a href='javascript:void(0);' class='btn btn-default fz-12 change_status' data-id='$value->alamat_id' data-nama_alamat='$value->alamat_nama' style='line-height:13px;padding:10px;' title='Jadikan Alamat utama'><i class='fa fa-check' aria-hidden='true'></i></a>
                                                                                    <a href='#' class='btn btn-default fz-12' style='line-height:13px;padding:10px;' title='Ubah Alamat'><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                                                                    <a href='#' class='btn btn-default fz-12' style='line-height:13px;padding:10px;' title='Hapus Alamat'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                                                                        }

                                                                    echo    "$aktif
                                                                        </td>
                                                                    </tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- paginatoin-area start -->
                                            <div class="paginatoin-area">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <ul class="pagination-box">
                                                            <?php echo $pagination;?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- paginatoin-area end -->  
                                    </div>
                                </div>
                            </div>
                        </div>
<?php echo $this->load->view('profile/footer');?>

<script>
    $("#kota").hide();
    $(function(){
       $('.province').select2({
           minimumInputLength: 3,
           allowClear: true,
           placeholder: 'masukkan nama propinsi',
           ajax: {
              dataType: 'json',
              url: '<?php echo base_url('profile/province');?>',
              delay: 800,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
              return {
                results: data
              };
            },
          }
      }).on('select2:select', function (evt) {
         var data = $(".province option:selected").text();
         var province_id = $(this).val();
         var urllnya = '<?php echo base_url('profile/city/');?>'+province_id;
         console.log(urllnya);
         $.ajax({
             type: "GET",
             url: urllnya,
             dataType: "json",
             success: function (response) {
                //  console.log(response);
                // var json = JSON.parse(response);
                // console.log(response);
                var html = '';
                $.each(response, function (key, value) { 
                     html += '<option value="'+value.id+'">'+value.text+'<option>';
                });
                $("#kota").show();
                $(".kota").html(html);
             }
         });
      });

        var urll_add_alamat = '<?php echo base_url('profile/add/alamat');?>';
        var cls_add_alamat = '.frm-add-alamat';
        var buton_add_alamat = '.buton-add-alamat';
        global.init_form_add(cls_add_alamat, buton_add_alamat, urll_add_alamat);

        $(".change_status").click(function(){
            var id = $(this).data('id');
            var nama = $(this).data('nama_alamat');
            console.log(id, nama);
            swal({
                title: "Jadikan Alamat Utama",
                text: 'Apakah Anda yakin ingin menjadikan "'+nama+'" sebagai alamat utama? Anda hanya dapat memilih satu alamat utama.',
                //  
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    urll = "<?php echo base_url('front_office/Profile/change_alamat_user/');?>"+id;
                    $.ajax({
                        type: "POST",
                        url: urll,
                        success: function (response) {
                            var response = JSON.parse(response);
                            var icons = response.status == true ? "success" : "danger";
                            swal(response.message, {
                                    icon: icons,
                                });
                            location.reload()
                        }
                    });
                    
                } else {
                    // swal("Your imaginary file is safe!");
                }
            });
        });
        

 });

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>