<div id="modal_pengeluaran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pengeluaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" class="parsley-pengeluaran">
                <div class="modal-body p-4">
                    <?php $value = (isset($pengeluaran->id_pengeluaran))?$pengeluaran->id_pengeluaran:""; ?>
                    <input type="hidden" name="id_pengeluaran" value="<?php echo $value; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($pengeluaran->tgl_pengeluaran) ? $pengeluaran->tgl_pengeluaran : ""; ?>
                                <label for="field-1" class="control-label">Tanggal Pengeluaran</label>
                                <input type="text" class="form-control" placeholder="Masukan Tanggal Pengeluaran" data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-d" name="tgl_pengeluaran" value="<?php echo $value; ?>" parsley-trigger="change" required>                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($pengeluaran->nama_pengeluaran) ? $pengeluaran->nama_pengeluaran : ""; ?>
                                <label for="field-2" class="control-label">Nama Pengeluaran</label>
                                <input type="text" class="form-control" name="nama_pengeluaran" placeholder="Masukan Nama Pengeluaran" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($pengeluaran->jumlah_pengeluaran) ? $pengeluaran->jumlah_pengeluaran : ""; ?>
                                <label for="field-3" class="control-label">Jumlah (Satuan)</label>
                                <input type="number" min="0" class="form-control" name="jumlah_pengeluaran" placeholder="Masukan Jumlah" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $value = isset($pengeluaran->total_harga) ? $pengeluaran->total_harga : ""; ?>
                                <label for="field-4" class="control-label">Total Pengeluaran</label>
                                <input type="number" min="0" class="form-control" name="total_harga" placeholder="Masukan Total Pengeluaran" value="<?php echo $value; ?>" parsley-trigger="change" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <?php $value = isset($pengeluaran->keterangan) ? $pengeluaran->keterangan : ""; ?>
                                <label for="field-5" class="control-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" placeholder="Masukan Keterangan" parsley-trigger="change" required><?php echo $value; ?></textarea>
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
    $(".parsley-pengeluaran").parsley();
    $("#modal_pengeluaran").modal('show');


    $("#form").on("submit", (function (b) {
        b.preventDefault();
        var url;
        if (simpan == "create") {
            url = "<?php echo base_url("back_office/pengeluaran/create_pengeluaran");?>"
        } else {
            url = "<?php echo base_url("back_office/pengeluaran/update_pengeluaran");?>"
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
                $("#modal_pengeluaran").modal("hide");
                if (data.status){
                    Swal.fire({
                        title: "Sukses",
                        text:   data.msg,
                        type: "success"
                    }).then(function(){ 
                        // location.reload();
                        $('#pengeluaran_datatable').DataTable().ajax.reload();
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