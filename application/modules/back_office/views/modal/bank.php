
<div id="modal_bank" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" class="parsley-bank">
                <div class="modal-body p-4">
                    <?php $value = (isset($bank->bank_id))?$bank->bank_id:""; ?>
                    <input type="hidden" name="bank_id" value="<?php echo $value; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($bank->bank_nama) ? $bank->bank_nama : ""; ?>
                                <label for="field-1" class="control-label">Nama Bank</label>
                                <input type="text" class="form-control" name="bank_nama" placeholder="Masukan Nama Bank" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($bank->bank_rekening) ? $bank->bank_rekening : ""; ?>
                                <label for="field-3" class="control-label">Nomor Rekening</label>
                                <input type="number" min="0" class="form-control" name="bank_rekening" placeholder="Masukkan Nomor Rekening" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($bank->bank_atas_nama) ? $bank->bank_atas_nama : ""; ?>
                                <label for="field-4" class="control-label">Atas Nama</label>
                                <input type="text" class="form-control" name="bank_atas_nama" placeholder="Masukkan Atas Nama" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Logo Bank</label>
                                <input type="file" name="bank_foto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $value = isset($bank->status) ? $bank->status : ""; ?>
                            <p class="text-muted mt-3 mb-2">Status Bank</p>
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
    $(".parsley-product").parsley();
    $("#modal_bank").modal('show');


    $("#form").on("submit", (function (b) {
        b.preventDefault();
        var url;
        if (simpan == "create") {
            url = "<?php echo base_url("back_office/bank/create_bank");?>"
        } else {
            url = "<?php echo base_url("back_office/bank/update_bank");?>"
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
                $("#modal_bank").modal("hide");
                if (data.status){
                    Swal.fire({
                        title: "Sukses",
                        text:   data.msg,
                        type: "success"
                    }).then(function(){ 
                        // location.reload();
                        $('#bank_datatable').DataTable().ajax.reload();
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