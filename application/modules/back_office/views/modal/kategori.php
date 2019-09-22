
<div id="modal_kategori" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Produk Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" class="parsley-kategori">
                <div class="modal-body p-4">
                    <?php $value = (isset($kategori->cate_id))?$kategori->cate_id:""; ?>
                    <input type="hidden" name="cate_id" value="<?php echo $value; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($kategori->cate_name) ? $kategori->cate_name : ""; ?>
                                <label for="field-1" class="control-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="cate_name" placeholder="Masukan Nama Kategori" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $value = isset($kategori->status) ? $kategori->status : ""; ?>
                            <p class="text-muted mt-3 mb-2">Status Kategori</p>
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
    $(".parsley-kategori").parsley();
    $("#modal_kategori").modal('show');


    $("#form").on("submit", (function (b) {
        b.preventDefault();
        var url;
        if (simpan == "create") {
            url = "<?php echo base_url("back_office/kategori/create_kategori");?>"
        } else {
            url = "<?php echo base_url("back_office/kategori/update_kategori");?>"
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
                $("#modal_kategori").modal("hide");
                if (data.status){
                    Swal.fire({
                        title: "Sukses",
                        text:   data.msg,
                        type: "success"
                    }).then(function(){ 
                        // location.reload();
                        $('#kategori_datatable').DataTable().ajax.reload();
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