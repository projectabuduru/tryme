<style>
    .btn{
        line-height: 13px;
        padding: 6px;
        font-size: 12px;
    }
</style>
<?php
    $src = !empty($user->user_image) ? $user->user_image : base_url('assets//images/profile/default-profile.png');
?>
<!-- ============ MODAL ADD BARANG =============== -->
<div class="modal fade" id="modal_edit_profile" tabindex="-1" role="dialog" aria-labelledby="mediumModal" aria-hidden="true">
    <div class="modal-dialog">
        
        <div class="modal-content" style="width:50%;margin-left:25%">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel" style="margin-left:25%;">Ubah Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body fz-12">
                <form class="form-horizontal frm-edit-user" method="post" action="<?php echo base_url('front_office/Profile/action_edit');?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Foto Profile</label>
                        <div class="col-xs-8">
                            <img src="<?php echo $src;?>" id="image-preview" alt="image preview" style="margin: 10px;width: 100%;height: 240px;object-fit: scale-down;">
                            <input name="user_image" type="file" class="fz-12" id="image-source" onchange="previewImage();">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Alamat</label>
                        <div class="col-xs-8">
                            <input name="user_nama" value="<?php echo $user->user_nama;?>" class="form-control fz-12" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Emailt</label>
                        <div class="col-xs-8">
                            <input name="user_email" value="<?php echo $user->user_email;?>" class="form-control fz-12" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" > Telpon</label>
                        <div class="col-xs-8">
                            <input name="user_telp" value="<?php echo $user->user_telp;?>" class="form-control fz-12" type="text" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-close fz-12" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-success buton-edit-user fz-12" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal_edit_password" tabindex="-1" role="dialog" aria-labelledby="mediumModal" aria-hidden="true">
    <div class="modal-dialog">
        
        <div class="modal-content" style="width:50%;margin-left:25%">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel" style="margin-left:25%;">Ubah Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body fz-12">
                <form class="form-horizontal frm-edit-password" method="post" action="<?php echo base_url('front_office/Profile/action_edit_password');?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password Lama</label>
                        <div class="col-xs-8">
                            <input type="password" name="password_lama" class="form-control fz-12" placeholder="Password lama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password Baru</label>
                        <div class="col-xs-8">
                            <input type="password" name="password_baru" class="form-control fz-12" placeholder="Password Baru">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Masukkan ulang password baru</label>
                        <div class="col-xs-8">
                            <input type="password" name="password_baruc" class="form-control fz-12" placeholder="Konfirmasi password">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="btn btn-close fz-12" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-success buton-edit-password fz-12" type="button">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--END MODAL ADD BARANG-->
<?php echo $this->load->view('profile/header');?>
    <div class="col-md-12 col-lg-10">
        <!-- Tab panes -->
        <div class="tab-content dashboard-content">
            <div class="tab-pane active" id="dashboard">
                <h3>Profil Akun </h3>
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                    <div class="col-lg-4">
                        <div class="col-xs-12 col-md-12">
                            <a href="#" class="thumbnail">
                                <img src="<?php echo $src;?>" alt="...">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-single-info">
                            <h4>Informasi Umum
                                <a class="btn btn-default modal-edit" title="Ubah Profile" aria-hidden="true" data-toggle="modal" data-target="#modal_edit_profile"><i class="fa fa-pencil-square-o"></i></a>
                                <a class="btn btn-warning" title="Ubah Kata Sandi" aria-hidden="true" data-toggle="modal" data-target="#modal_edit_password" ><i class="fa fa-unlock-alt" aria-hidden="true"></i></a>
                            </h4>
                            <table class="table">
                                <tr>
                                    <td width="20%">Nama</td>
                                    <td><?php echo $user->user_nama;?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $user->user_email;?></td>
                                </tr>
                                <tr>
                                    <td>No. Telpon</td>
                                    <td><?php echo $user->user_telp;?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->load->view('profile/footer');?>
<!-- main-content-wrap end -->

<script>
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
        
            oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };
    $(document).ready(function () {
        var urll_ubah_password = '<?php echo base_url('front_office/Profile/action_edit');?>';
        var cls_ubah_password = '.frm-edit-password';
        var buton_ubah_password = '.buton-edit-password';
        global.init_form_add(cls_ubah_password, buton_ubah_password, urll_ubah_password);
    });
   
    // $("#modal").click(function(){
    //     $.ajax({
    //         type: "POST",
    //         url: "<?php echo base_url('front_office/Profile/edit');?>",
    //         success: function (response) {
    //             console.log(response);
    //         }
    //     });
    // });
</script>