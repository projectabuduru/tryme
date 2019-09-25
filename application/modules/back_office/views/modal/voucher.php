<div id="modal_voucher" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Voucher</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" class="parsley-voucher">
                <div class="modal-body p-4">
                    <?php $value = (isset($voucher->voc_id))?$voucher->voc_id:""; ?>
                    <input type="hidden" name="voc_id" value="<?php echo $value; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($voucher->voc_name) ? $voucher->voc_name : ""; ?>
                                <label for="field-1" class="control-label">Nama Voucher</label>
                                <input type="text" class="form-control" name="voc_name" placeholder="Masukan Nama Voucher" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($voucher->voc_kode) ? $voucher->voc_kode : ""; ?>
                                <label for="field-2" class="control-label">Kode Voucher</label>
                                <input type="text" class="form-control" name="voc_kode" placeholder="Masukan Kode Voucher" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($voucher->voc_nominal) ? $voucher->voc_nominal : ""; ?>
                                <label for="field-3" class="control-label">Nominal Voucher</label>
                                <input type="number" class="form-control" name="voc_nominal" placeholder="Masukan Nominal Voucher" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($voucher->expired) ? $voucher->expired : ""; ?>
                                <label for="field-4" class="control-label">Expired Voucher</label>
                                <input type="text" class="form-control" placeholder="Masukan Expired Voucher" data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-d" name="expired" data-date-start-date="+1d" value="<?php echo $value; ?>" parsley-trigger="change" required>                            
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
    $(".parsley-voucher").parsley();
    $("#modal_voucher").modal('show');


    $("#form").on("submit", (function (b) {
        b.preventDefault();
        var url;
        if (simpan == "create") {
            url = "<?php echo base_url("back_office/voucher/create_voucher");?>"
        } else {
            url = "<?php echo base_url("back_office/voucher/update_voucher");?>"
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
                $("#modal_voucher").modal("hide");
                if (data.status){
                    Swal.fire({
                        title: "Sukses",
                        text:   data.msg,
                        type: "success"
                    }).then(function(){ 
                        // location.reload();
                        $('#voucher_datatable').DataTable().ajax.reload();
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