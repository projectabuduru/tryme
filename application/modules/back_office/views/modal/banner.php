<div id="modal_banner" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" class="parsley-banner">
                <div class="modal-body p-4">
                    <?php $value = (isset($banner->banner_id)) ? $banner->banner_id : ""; ?>
                    <input type="hidden" name="banner_id" value="<?php echo $value; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($banner->nama_banner) ? $banner->nama_banner : ""; ?>
                                <label for="field-1" class="control-label">Nama Banner</label>
                                <input type="text" class="form-control" name="nama_banner" placeholder="Masukan Nama Banner" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Gambar Banner</label>
                                <input type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $value = isset($bank->status) ? $bank->status : ""; ?>
                            <p class="text-muted mt-3 mb-2">Status Bank</p>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="status1" value="Y" name="status" <?php echo ($value == "Y") ? "checked" : "checked"; ?>>
                                <label for="inlineRadio1"> Aktif </label>
                            </div>
                            <div class="radio form-check-inline">
                                <input type="radio" id="status2" value="N" name="status" <?php echo ($value == "N") ? "checked" : ""; ?>>
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
    $(".parsley-banner").parsley();
    $("#modal_banner").modal('show');


    $("#form").on("submit", (function(b) {
        b.preventDefault();
        var url;
        if (simpan == "create") {
            url = "<?php echo base_url("back_office/banner/create_banner"); ?>"
        } else {
            url = "<?php echo base_url("back_office/banner/update_banner"); ?>"
        }
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            contentType: !1,
            cache: !1,
            processData: !1,
            success: function(c) {
                data = JSON.parse(c);
                $("#modal_banner").modal("hide");
                if (data.status) {
                    Swal.fire({
                        title: "Sukses",
                        text: data.msg,
                        type: "success"
                    }).then(function() {
                        // location.reload();
                        $('#banner_datatable').DataTable().ajax.reload();
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: data.msg,
                        type: "error"
                    });
                }
            },
            error: function(c, e, d) {
                Swal.fire("Error", "Gagal Insert Data", "error")
            }
        });
        return !1
    }));
</script>