<div id="modal_point" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Point</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" class="parsley-point">
                <div class="modal-body p-4">
                    <?php $value = (isset($point->point_id)) ? $point->point_id : ""; ?>
                    <input type="hidden" name="point_id" value="<?php echo $value; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($point->min_trans) ? $point->min_trans : ""; ?>
                                <label for="field-1" class="control-label">Minimal Transaksi</label>
                                <input type="number" min="0" class="form-control" name="min_trans" id="min_trans" placeholder="Masukan Minimal Transaksi" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($point->max_trans) ? $point->max_trans : ""; ?>
                                <label for="field-2" class="control-label">Maximal Transaksi</label>
                                <input type="number" min="0" class="form-control" name="max_trans" id="max_trans" placeholder="Masukan Maksimal Transaksi" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($point->value) ? $point->value : ""; ?>
                                <label for="field-3" class="control-label">Jumlah Point</label>
                                <input type="number" min="0" class="form-control" name="value" placeholder="Masukan Jumlah Point" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $value = isset($point->status) ? $point->status : ""; ?>
                            <p class="text-muted mt-3 mb-2">Status</p>
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
    $(".parsley-point").parsley();
    $("#modal_point").modal('show');


    $("#form").on("submit", (function(b) {
        b.preventDefault();
        var url;
        if (simpan == "create") {
            url = "<?php echo base_url("back_office/point/create_point"); ?>"
        } else {
            url = "<?php echo base_url("back_office/point/update_point"); ?>"
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
                $("#modal_point").modal("hide");
                if (data.status) {
                    Swal.fire({
                        title: "Sukses",
                        text: data.msg,
                        type: "success"
                    }).then(function() {
                        // location.reload();
                        $('#point_datatable').DataTable().ajax.reload();
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

    $(document).bind('input change paste keyup', "#min_trans", function() {
	var min_trans = $("#min_trans").val();
    document.getElementById("max_trans").setAttribute("min", min_trans);
})
</script>