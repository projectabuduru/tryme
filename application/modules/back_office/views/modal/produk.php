<?php if(isset($type)){ ?>
    <div id="modal_produk" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <?php if ($product->product_image != NULL) { 
                            $gambar = "assets/images/product/".$product->product_image;
                        } else {
                            $gambar = "assets/images/no-img.png";
                        } ?>
                        <div class="col-sm-3 pull-left">
                            <img src="<?php echo base_url().$gambar;?>" class="img-thumbnail" width="150">
                        </div>
                        <div class="col-sm-9">
                            <span style="cursor:pointer; font-size:150%;"><b><?php echo $product->product_name;?></b></span> <br>
                            Kategori Produk <?php echo $product->cate_name; ?><br>
                            <?php echo "Rp ".number_format($product->product_price);?><br>
                            <?php echo "Rp ".number_format($product->product_price_partner);?><br>
                            <?php echo $product->product_stok; ?> Stok Tersisa <br>
                            <?php echo $product->product_berat; ?> gram <br><br>
                            Deskripsi Produk : <br>
                            <?php echo $product->product_description; ?> <br><br>
                            Manfaat Produk : <br>
                            <?php echo $product->product_manfaat; ?> <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
<?php }else{ ?>
    <div id="modal_produk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form id="form" class="parsley-product">
                    <div class="modal-body p-4">
                        <?php $value = (isset($product->product_id))?$product->product_id:""; ?>
                        <input type="hidden" name="product_id" value="<?php echo $value; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php $value = isset($product->product_name) ? $product->product_name : ""; ?>
                                    <label for="field-1" class="control-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Masukan Nama Product" value="<?php echo $value; ?>" parsley-trigger="change" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Kategori Produk</label>
                                    <select name="cate_id" class="select2 form-control input" style="width: 100%;" >
                                        <?php 
                                        $value = (isset($produk->cate_id))?$produk->cate_id : "";
                                        foreach ($kategori as $get_kategori) {
                                            if ($get_kategori['cate_id'] == $value) {
                                                $select = "selected";
                                            } else{
                                                $select = "";
                                            }
                                            echo "<option ".$select." value='".$get_kategori['cate_id']."'>".$get_kategori['cate_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php $value = isset($product->product_price) ? $product->product_price : ""; ?>
                                    <label for="field-3" class="control-label">Harga Produk</label>
                                    <input type="number" min="0" class="form-control" name="product_price" placeholder="Masukkan Harga Produk" value="<?php echo $value; ?>" parsley-trigger="change" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php $value = isset($product->product_price_partner) ? $product->product_price_partner : ""; ?>
                                    <label for="field-4" class="control-label">Harga Produk Dropship</label>
                                    <input type="number" min="0" class="form-control" name="product_price_partner" placeholder="Masukkan Harga Dropshipper" value="<?php echo $value; ?>" parsley-trigger="change" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php $value = isset($product->product_stok) ? $product->product_stok : ""; ?>
                                    <label for="field-5" class="control-label">Stok</label>
                                    <input type="number" min="0" class="form-control" name="product_stock" placeholder="Masukkan Stok" value="<?php echo $value; ?>" parsley-trigger="change" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php $value = isset($product->product_berat) ? $product->product_berat : ""; ?>
                                    <label for="field-9" class="control-label">Berat (gram)</label>
                                    <input type="number" min="0" class="form-control" name="product_berat" placeholder="Masukkan Berat (gram)" value="<?php echo $value; ?>" parsley-trigger="change" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Gambar Product</label>
                                    <input type="file" name="product_image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <?php $value = isset($product->product_description) ? $product->product_description : ""; ?>
                                    <label for="field-7" class="control-label">Deskripsi Product</label>
                                    <textarea class="form-control" name="product_description" placeholder="Masukan Deskripsi Produk" parsley-trigger="change" required ><?php echo $value; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <?php $value = isset($product->product_manfaat) ? $product->product_manfaat : ""; ?>
                                    <label for="field-8" class="control-label">Manfaat Produk</label>
                                    <textarea class="form-control" name="product_manfaat" placeholder="Masukan Manfaat Produk" parsley-trigger="change" required><?php echo $value; ?></textarea>
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
<?php } ?>



<script type="text/javascript">
    $(".parsley-product").parsley();
    $('.select2').select2({
        placeholder: "Silahkan Pilih",
        allowClear: true
    });
    $("#modal_produk").modal('show');


    $("#form").on("submit", (function (b) {
        b.preventDefault();
        var url;
        if (simpan == "create") {
            url = "<?php echo base_url("back_office/product/create_product");?>"
        } else {
            url = "<?php echo base_url("back_office/product/update_product");?>"
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
                $("#modal_produk").modal("hide");
                if (data.status){
                    Swal.fire({
                        title: "Sukses",
                        text:   data.msg,
                        type: "success"
                    }).then(function(){ 
                        // location.reload();
                        $('#product_datatable').DataTable().ajax.reload();
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