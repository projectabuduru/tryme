<style>
    .img-bank{
        width: 90px;height: 45px;
        object-fit: scale-down;
        position: relative;
        /* float: right; */
    }
</style>
<!-- main-content-wrap start -->
    <form action="<?php echo base_url('front_office/order/proses_checkout');?>" method="POST" enctype="multipart/form-data">
        <div class="main-content-wrap section-ptb checkout-page">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="coupon-area">
                            <!-- coupon-accordion start -->
                            <!-- <div class="coupon-accordion">
                                <h3>Returning customer? <span class="coupon" id="showlogin">Click here to login</span></h3>
                                <div class="coupon-content" id="checkout-login">
                                    <div class="coupon-info">
                                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                        <form action="#">
                                            <p class="coupon-input form-row-first">
                                                <label>Username or email <span class="required">*</span></label>
                                                <input type="text" required name="email">
                                            </p>
                                            <p class="coupon-input form-row-last">
                                                <label>password <span class="required">*</span></label>
                                                <input type="password" required name="password">
                                            </p>
                                            <div class="clear"></div>
                                            <p>
                                                <button type="submit" class="button-login btn" required name="login" value="Login">Login</button>
                                                <label class="remember"><input type="checkbox" value="1"><span>Remember</span></label>
                                            </p>
                                            <p class="lost-password">
                                                <a href="#">Lost your password?</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <!-- coupon-accordion end -->
                            <!-- coupon-accordion start -->
                            <div class="coupon-accordion">
                                <h3>Have a coupon? <span class="coupon" id="showcoupon">Kupon</span></h3>
                                <div class="coupon-content" id="checkout-coupon">
                                    <div class="coupon-info">
                                        <form action="#">
                                            <p class="checkout-coupon">
                                                <input type="text" placeholder="Coupon code">
                                                <button type="submit" class="btn button-apply-coupon" required name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- coupon-accordion end -->
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper start -->
                <div class="checkout-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                <!-- <form action="#"> -->
                                    <h3 class="shoping-checkboxt-title">Detail Pembeli</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Penerima<span class="required">*</span></label>
                                                <input type="text" required name="user_penerima">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Nomor Telpon<span class="required">*</span></label>
                                                <input type="text" required name="user_penerima_telp">
                                            </p>    
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Email<span class="required">*</span></label>
                                                <input type="email" required name="order_email">
                                            </p>    
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single-form-row">
                                                <label>Provinsi <span class="required">*</span></label>
                                                <div class="nice-select wide">
                                                    <select required name="alamat_provinsi_id" class="province fz-12">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="show-kota">
                                            <div class="single-form-row">
                                                <label>Kota / Kabupaten <span class="required">*</span></label>
                                                <div class="nice-select wide">
                                                    <select required name="alamat_kota_id" class="kota fz-12">
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Alamat<span class="required">*</span></label>
                                                <textarea placeholder="Isikan Alamat lengkap tujuan" class="checkout-mess" rows="2" cols="5" required name="alamat"></textarea>    
                                            </p>    
                                        </div>
                                        <div class="col-lg-12" id="show-kurir">
                                            <div class="single-form-row">
                                                <label>Kurir <span class="required">*</span></label>
                                                <div class="nice-select wide">
                                                    <select required name="kurir" class="kurir fz-12">
                                                        <option>--Pilih Kurir--</option>
                                                        <option value="jne">JNE</option>
                                                        <option value="tiki">TIKI</option>
                                                        <option value="pos">POS</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="show-paket">
                                            <div class="single-form-row">
                                                <label>Paket pengiriman<span class="required">*</span></label>
                                                <div class="nice-select wide">
                                                    <select required name="kurir_paket" class="paket fz-12">
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row m-0">
                                                <label>Order notes</label>
                                                <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5" required name="order_notes"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                <!-- </form> -->
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title">Your Order</h3>
                                <!-- your-order-wrap start-->
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list-checkout-body">
                                                
                                                
                                            </tbody>
                                            <tfoot class="list-checkout-footer">
                                                
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- your-order-table end -->

                                    <!-- your-order-wrap end -->
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <!-- ACCORDION START -->
                                            <h5>Direct Bank Transfer</h5>
                                            <div class="payment-content">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                
                                                    <div class="row list-bank">
                                                    </div>
                                                
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <!-- <h5>Cheque Payment</h5>
                                            <div class="payment-content">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div> -->
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <!-- <h5>PayPal</h5>
                                            <div class="payment-content">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                            </div> -->
                                            <!-- ACCORDION END -->
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Place order" />
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper end -->
            </div>
        </div>
        <!-- main-content-wrap end -->
    </form>
        <script>
            $(document).ready(function () {
                
                //get data cart
                let total_berat = 0;
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('front_office/Cart/mycart');?>",
                    dataType: "json",
                    success: function (response) {
                        var data = response.data
                        // console.log(data);
                        var html = '';
                        var html_footer = '';
                        var total_barang = 0, total = 0;
                        
                        $.each(data, function (key, value) { 
                            total_barang = value.product_qty * value.price;
                            total = total + total_barang;
                             html += '<tr class="cart_item">' +
                                        '<td class="product-name">' +
                                            ''+value.product_name+'<strong class="product-quantity"> × '+value.product_qty+'</strong>' +
                                            '<input type="hidden" required name="detail_qty['+value.product_id+']" value="'+value.product_qty+'">'+
                                        '</td>' +
                                        '<td class="product-total">' +
                                            '<span class="amount product_price">Rp. '+total_barang.toLocaleString()+'</span>' +
                                            '<input type="hidden" required name="product_price['+value.product_id+']" class="product_price" value="'+value.price+'">' +
                                            '<input type="hidden" required name="total_product_price['+value.product_id+']" class="product_price" value="'+total_barang+'">' +
                                        '</td>' +
                                   '</tr>';
                            total_berat += value.product_berat * value.product_qty;
                        });
                        console.log(total_berat);
                        console.log(total);
                        $('.list-checkout-body').html(html);
                        html_footer = '<tr class="cart-subtotal">'+
                                            '<th>Cart Subtotal</th>'+
                                            '<td>'+
                                                '<span class="amount subtotal"> Rp. '+total.toLocaleString()+'</span>'+
                                            '</td>'+
                                        '</tr>'+
                                        '<tr class="order-total">'+
                                            '<th>Order Total</th>'+
                                            '<td>'+
                                                '<strong><span class="amount total">Rp. '+total.toLocaleString()+'</span></strong>' +
                                                '<input type="hidden" required name="order_price_total" class="order_price_total" value="'+total+'">'+
                                        '</td>'+
                                        '</tr>';
                        $('.list-checkout-footer').html(html_footer);
                    }
                });

                //get data bank
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('front_office/Bank/get_data_bank_aktif');?>",
                    dataType: "json",
                    success: function (response) {
                        var data = response.data;
                        console.log(data);
                        var html = '';
                        $.each(data, function (key, value) { 
                            html += '<div class="col-lg-12">'+
                                        '<input type="radio" required name="bank_id" value="'+value.bank_id+'">'+
                                        '<label><img src="<?php echo base_url('assets/images/bank/');?>'+value.bank_foto+'" class="img-bank"></label>'+
                                    '</div>';  
                        });
                        $('.list-bank').html(html);
                    }
                });

                //select2
                $("#show-kota").hide();
                $('#show-kurir').hide();
                $('#show-paket').hide();
                $('.province').select2({
                    minimumInputLength: 2,
                    allowClear: false,
                    placeholder: 'masukkan nama propinsi',
                    ajax: {
                        dataType: 'json',
                        url: '<?php echo base_url('front_office/Rajaongkir/province');?>',
                        delay: 800,
                        data: function(params) {
                            return {
                            search: params.term
                            }
                        },
                        processResults: function (data, page) {
                            $("#show-kota").show();
                            return {
                                results: data
                            };
                        },
                    }
                }).on('select2:select', function (evt) {
                    var data = $(".province option:selected").text();
                    var province_id = $(this).val();
                    var urllnya = '<?php echo base_url('front_office/Rajaongkir/city/');?>'+province_id;
                    console.log(urllnya);
                    $.ajax({
                        type: "GET",
                        url: urllnya,
                        dataType: "json",
                        success: function (response) {
                            //  console.log(response);
                            // var json = JSON.parse(response);
                            // console.log(response);
                            var html = '';
                            $.each(response, function (key, value) { 
                                html += '<option value="'+value.id+','+value.kodepos+'">'+value.text+'</option>';
                            });
                            $(".kota").show();
                            $(".kota").html(html);
                            $("#show-kurir").show();
                        }
                    });
                });

                $('.kota').change(function(){
                    $('.kurir').prop('selectedIndex',0);
                    // console.log('reset');
                });

                $(".kurir").change(function(){
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('front_office/Rajaongkir/cost');?>",
                        data: {destination : $('.kota').val(),weight:total_berat,courier:$(this).val()},
                        success: function (response) {
                            var response = JSON.parse(response);
                            console.log(response);
                            if(response.status ===  true){
                                var html = '';
                                $.each(response.data, function (key, value) { 

                                    html += '<option value="'+value.service+','+value.cost[0].value+'">'+value.description+'('+value.cost[0].etd+' Hari)</option>';

                                });
                                $(".paket").html(html);
                                $("#show-paket").show();
                            }else{
                                toastr.error(response.message);
                            }
                            // console.log(data.data);
                        }
                    });
                });              

            });
        </script>