<style>
    .swal-text{
        font-size:14px;
    }
    .swal-title{
        font-size:16px;
    }
</style>
<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb cart-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo base_url('front_office/Cart/cart_upgrade') ;?>" enctype="multipart/form-data" class="cart-table frm-update-cart">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="plantmore-product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="plantmore-product-price">Unit Price</th>
                                            <th class="plantmore-product-quantity">Quantity</th>
                                            <th class="plantmore-product-subtotal">Total</th>
                                            <th class="plantmore-product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mycart">
                                        

                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="coupon-all">

                                        <div class="coupon2">
                                        </div>

                                        <div class="coupon">
                                            <h3>Coupon</h3>
                                            <p>Enter your coupon code if you have one.</p>
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ml-auto">
                                    <div class="cart-page-total">
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->

<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('front_office/Cart/mycart');?>",
            dataType: "json",
            success: function (response) {
                var data = response.data;
                var html = '';
                var total = 0;
                var total_sub_barang = 0;
                var diskon = '';
                var proses_transaksi = '';
                console.log(data.length);
                var update_cart = '';
                if(data.length > 0){
                    $.each(data, function (key, value) { 
                        // total++;

                        if(value.old_price == value.price){
                            diskon = '<span class="new-price"> Rp. '+value.price.toLocaleString()+', </span>';
                        }else{
                            diskon = '<span class="old-price"> Rp. <del>'+value.old_price.toLocaleString()+',</del> </span><br>'+
                                                '<span class="new-price"> Rp. '+value.price.toLocaleString()+', </span>';
                        }
                            total_sub_barang = value.price * value.product_qty;
                            html +='<tr>' +
                                        '<td class="plantmore-product-thumbnail"><a href="#"><img alt="" src="<?php echo base_url('assets/images/product/');?>'+value.product_image+'" style="width:35%"></a></td>' +
                                        '<td class="plantmore-product-name"><a href="javscript:void(0);">'+value.product_name+'</a></td>' +
                                        '<td class="plantmore-product-price">'+
                                            '<span class="amount">'+diskon+
                                            '</span></td>' +
                                        '<td class="plantmore-product-quantity">' +
                                            '<input type="hidden" name="product_id[]" value="'+value.product_id+'"><input value="'+value.product_qty+'" name="qty[]" type="number" min="0" max="'+value.product_stok+'" data-harga="'+value.price+'" data-qty="'+value.product_qty+'" data-id="'+value.product_id+'" class="cart-qty">' +
                                        '</td>' +
                                        '<td class="product-subtotal"><span class="amount" id="'+value.product_id+'">Rp. '+total_sub_barang.toLocaleString()+'</span></td>' +
                                        '<td class="plantmore-product-remove"><a data-id="'+value.product_id+'" data-nama="'+value.product_name+'" class="cart-delete"><i class="ion-close"></i></a></td>' +
                                    '</tr>';
                            total = total + total_sub_barang;
                    });
                    proses_transaksi = '<a href="<?php echo base_url('order/checkout');?>" class="proceed-checkout-btn"> Proses transaksi</a>';
                    update_cart = '<input class="submit btn btn-cart" name="update_cart" value="Update cart" type="button"><a href="shop.html" class="btn continue-btn">Continue Shopping</a>';
                }else{
                    html += '<tr><td colspan="6" class="fz-12">Belum ada memiliki keranjang</td></tr>';
                    update_cart = '<a href="shop.html" class="btn continue-btn">Continue Shopping</a>';
                }
                
                var html_total = '<h2>Cart totals</h2>'+
                                '<ul>' +
                                    '<li>Subtotal <span class="cart-sub-total" data-subtotal="'+total+'"> Rp. '+total.toLocaleString()+' </span></li>' +
                                    '<li>Total <span class="cart-total"> Rp. '+total.toLocaleString()+' </span></li>' +
                                '</ul>';
                    html_total += proses_transaksi;
                // console.log(total);
                $(".mycart").html(html);
                $(".coupon2").html(update_cart);
                $(".cart-page-total").html(html_total);
                    $(".cart-delete").click(function(){

                        var id = $(this).data('id');
                        var name = $(this).data('nama');
                        console.log(id, name);
                        var urll;
                        swal({
                            title: "Hapus Produk ?",
                            text: 'Barang '+name+' akan dihapus dari keranjang.',
                            //  
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                urll = "<?php echo base_url('front_office/Cart/cart_delete');?>";
                                $.ajax({
                                    type: "POST",
                                    url: urll,
                                    data: {product_id : id},
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

                    var cls_register = '.frm-update-cart';
                    var buton_register = '.btn-cart';
                    global.init_form_add(cls_register, buton_register);

                    $('.cart-qty').change(function(){
                        var id = '#'+$(this).data('id');
                        var vall = $(this).val();
                        var harga = $(this).data('harga');
                        var qty = $(this).data('qty');
                        var subtotal = $('.cart-sub-total').data('subtotal');
                        var sub_total_harga = harga * vall ;
                        var total_harga = 0;
                       
                       total_harga = (subtotal - (harga * qty)) + (harga * vall);
                        
                        
                        // subtotal = (subtotal)  + total_harga;
                        console.log(harga, vall, sub_total_harga, subtotal, total_harga);
                        // console.log(vall,harga);
                        $(id).html('Rp. '+sub_total_harga.toLocaleString()); 
                        $('.cart-sub-total').html('Rp.'+total_harga.toLocaleString());
                        $('.cart-sub-total').data('subtotal', total_harga);
                        $(this).data('qty', vall);
                        $('.cart-total').html('Rp.' +total_harga.toLocaleString());
                    })


            }
        });      
        

    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>