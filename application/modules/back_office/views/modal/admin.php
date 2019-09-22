
<div id="modal_admin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" class="parsley-admin">
                <div class="modal-body p-4">
                    <?php $value = (isset($admin->user_id))?$admin->user_id:""; ?>
                    <input type="hidden" name="user_id" value="<?php echo $value; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($admin->user_nama) ? $admin->user_nama : ""; ?>
                                <label for="field-1" class="control-label">Nama Admin</label>
                                <input type="text" class="form-control" name="user_nama" placeholder="Masukan Nama Admin" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($admin->user_password) ? $admin->user_password : ""; ?>
                                <label for="field-3" class="control-label">Password User</label>
                                <input type="password" class="form-control" name="user_password" placeholder="Masukkan Password User" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($admin->user_email) ? $admin->user_email : ""; ?>
                                <label for="field-4" class="control-label">Email</label>
                                <input type="email" class="form-control" name="user_email" placeholder="Masukkan Email User" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($admin->user_telp) ? $admin->user_telp : ""; ?>
                                <label for="field-4" class="control-label">Telp</label>
                                <input type="text" class="form-control" name="user_telp" placeholder="Masukkan Telp User" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Foto User</label>
                                <input type="file" name="user_image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $value = isset($admin->role) ? $admin->role : ""; ?>
                            <p class="text-muted mt-3 mb-2">Level</p>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="role1" value="admin" name="role" <?php echo ($value == "admin")?"checked":"checked"; ?>>
                                <label for="inlineRadio1"> Admin </label>
                            </div>
                            <div class="radio form-check-inline">
                                <input type="radio" id="role2" value="super_admin" name="role" <?php echo ($value == "super_admin")?"checked":""; ?>>
                                <label for="inlineRadio2">Super Admin </label>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $value = isset($admin->status) ? $admin->status : ""; ?>
                            <p class="text-muted mt-3 mb-2">Status</p>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="status1" value="Y" name="status" <?php echo ($value == "Y")?"checked":"checked"; ?>>
                                <label for="inlineRadio1"> Aktif </label>
                            </div>
                            <div class="radio form-check-inline">
                                <input type="radio" id="status2" value="N" name="status" <?php echo ($value == "N")?"checked":""; ?>>
                                <label for="inlineRadio2">Non Aktif </label>
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.modal -->

<script type="text/javascript">
    $(".parsley-admin").parsley();
    $("#modal_admin").modal('show');


    $("#form").on("submit", (function (b) {
        b.preventDefault();
        var url;
        if (simpan == "create") {
            url = "<?php echo base_url("back_office/admin/create_admin");?>"
        } else {
            url = "<?php echo base_url("back_office/admin/update_admin");?>"
        }
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            contentType: !1,
            cache: !1,
            processData: !1,
            success: function (c) {
                data = JSON.parse(c);
                $("#modal_admin").modal("hide");
                if (data.status){
                    Swal.fire({
                        title: "Sukses",
                        text:   data.msg,
                        type: "success"
                    }).then(function(){ 
                        // location.reload();
                        $('#admin_datatable').DataTable().ajax.reload();
                    });
                }else{
                    Swal.fire({
                        title: "Error",
                        text:   data.msg,
                        type: "error"
                    });
                }
            },
            error: function (c, e, d) {
                Swal.fire("Error", "Gagal Insert Data", "error")
            }
        });
        return !1
    }));
</script>