<!-- Hero Section Start -->
<div class="hero-slider hero-slider-one">

    <!-- Single Slide Start -->
    <?php foreach ($data['banner'] as $key => $value) { ?>    
        <div class="single-slide" style="background-image: url(<?php echo base_url($value['image']);?>)">
            <!-- Hero Content One Start -->
            <!-- <div class="hero-content-one container">
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <div class="slider-text-info">
                            <h2>A <span>Different</span> </h2>
                            <h1>Online <span>Flower</span> Shop </h1>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words...</p>
                            <div class="hero-btn">
                                <a href="shop.html" class="slider-btn uppercase"><span>SHOP NOW</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Hero Content One End -->
        </div>
    <?php } ?>


</div>
<!-- Hero Section End -->

<!-- Start Product Area -->
<div class="porduct-area section-pt section-pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="section-title text-center">
                    <h2><span>Feature</span> Product</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>

        <div class="row product-active-lg-4">

            <?php
                $html = '';
                // pre($data['feature_product']);
                foreach ($data['feature_product'] as $key => $value) {
                    $diskon = '';
                    $label_diskon = '';

                    if(!empty($user)){
                        $style = !empty($value['wish_id']) ? 'style="background-color: #ff5151;"' : null;
                        $cart = '<a class="add-to-cart" data-id="'.$value['product_id'].'"><i class="ion-bag"></i></a>
                                <a class="wishlist" data-id="'.$value['product_id'].'" '.$style.'><i class="ion-android-favorite-outline"></i></a>';
                    }else{
                        $cart = '<a class="add-to-cart" data-id="'.$value['product_id'].'"><i class="ion-bag"></i></a>';
                    }

                    if(!empty($value['diskon'])){
                        if($value['diskon_satuan'] == 'percent'){
                            $label_diskon = '<span class="label">'.$value['diskon'].'% Off</span>';
                        }
                        $diskon = '<span class="old-price"> Rp. '.number_format($value['product_price'],2) .', </span>
                                    <span class="new-price"> Rp. '.number_format($value['product_diskon'],2).', </span>';
                        
                    }else{
                        $diskon = '<span class="new-price"> Rp. '.number_format($value['product_price'],2).', </span>';
                        
                    }
                    
                    echo '<div class="col-lg-3">
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="product-details.html"><img src="'.base_url($value['product_image']).'" alt="Produce Images"></a>
                                    '.$label_diskon.'
                                    <div class="product-action">
                                        '.$cart.'
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">'.$value['product_name'].'</a></h3>
                                    <div class="price-box">';
                                        //kektika ada diskon pake
                                       
                                        echo $diskon.'
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            ?>
                      

        </div>
    </div>
</div>
<!-- Start Product End -->

<!-- Banner Area Start -->
<div class="banner-area section-pb">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <!-- Single Banner Start -->
                <div class="single-banner mt-30">
                    <img src="<?php echo base_url('assets/images/banner/banner-01.jpg');?>" alt="">
                    <div class="banner-content text-center">
                        <div class="banner-content-box">
                            <h4>Wedding Surprise</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the have suffered lebmid alteration in some ledmid form</p>
                            <a href="shop.html">Shop now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Banner End -->
            </div>

            <div class="col-lg-4 col-md-6">
                <!-- Single Banner Start -->
                <div class="single-banner mt-30">
                    <img src="<?php echo base_url('assets/images/banner/banner-02.jpg');?>" alt="">
                    <div class="banner-content text-center">
                        <div class="banner-content-box">
                            <h4>Wedding Surprise</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the have suffered lebmid alteration in some ledmid form</p>
                            <a href="shop.html">Shop now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Banner End -->
            </div>

            <div class="col-lg-4 col-md-6">
                <!-- Single Banner Start -->
                <div class="single-banner mt-30">
                    <img src="<?php echo base_url('assets/images/banner/banner-03.jpg');?>" alt="">
                    <div class="banner-content text-center">
                        <div class="banner-content-box">
                            <h4>Wedding Surprise</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the have suffered lebmid alteration in some ledmid form</p>
                            <a href="shop.html">Shop now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Banner End -->
            </div>

        </div>
    </div>
</div>
<!-- Banner Area End -->

<!-- Start Product Area -->
<div class="porduct-area section-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="section-title text-center">
                    <h2><span>All</span> Product</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>

        <div class="row product-two-row-4">

            <?php
                foreach ($data['all_product'] as $key => $value) {
                    $diskon = '';
                    $label_diskon = '';
                    if(!empty($value['diskon'])){
                        if($value['diskon_satuan'] == 'percent'){
                            $label_diskon = '<span class="label">'.$value['diskon'].'% Off</span>';
                        }
                        
                        $diskon = '<span class="old-price"> Rp. '.number_format($value['product_price'],2) .', </span>
                                    <span class="new-price"> Rp. '.number_format($value['product_diskon'],2).', </span>';
                    }else{
                        $diskon = '<span class="new-price"> Rp. '.number_format($value['product_price'],2).', </span>';
                    }

                    if(!empty($user)){
                        $style = !empty($value['wish_id']) ? 'style="background-color: #ff5151;"' : null;
                        $cart = '<a class="add-to-cart" data-id="'.$value['product_id'].'"><i class="ion-bag"></i></a>
                                <a class="wishlist" data-id="'.$value['product_id'].'" '.$style.'><i class="ion-android-favorite-outline"></i></a>';
                    }else{
                        $cart = '<a class="add-to-cart" data-id="'.$value['product_id'].'"><i class="ion-bag"></i></a>';
                    }

                    echo '<div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="product-details.html"><img src="'.base_url($value['product_image']).'" alt="Produce Images"></a>
                                    '.$label_diskon.'
                                    <div class="product-action">
                                        '.$cart.'
                                    </div>
                                </div>';
                               
                                echo '<div class="product-content">
                                    <h3><a href="product-details.html">Product Title</a></h3>
                                    <div class="price-box">
                                        '.$diskon.'
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>';
                }
            ?>
                        
        </div>

    </div>
</div>
</div>
<!-- Start Product End -->


<!-- testimonial-area start -->
<div class="testimonial-area testimonial-bg bg-gray overly-image section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-md-2 col-md-8 col-sm-12">
                <div class="testimonial-slider">
                    <div class="testimonial-inner text-center">
                        <div class="test-cont">
                            <img src="<?php echo base_url('assets/images/icon/quite.png');?>" alt="">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages.</p>
                        </div>
                        <div class="test-author">
                            <h5>JONATHON JORDAN</h5>
                        </div>
                    </div>
                    <div class="testimonial-inner text-center">
                        <div class="test-cont">
                            <img src="<?php echo base_url('assets/images/icon/quite.png');?>" alt="">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages.</p>
                        </div>
                        <div class="test-author">
                            <h5>Michelle Mitchell</h5>
                        </div>
                    </div>
                    <div class="testimonial-inner text-center">
                        <div class="test-cont">
                            <img src="<?php echo base_url('assets/images/icon/quite.png');?>" alt="">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages.</p>
                        </div>
                        <div class="test-author">
                            <h5>Max Mitchell</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial-area end -->


<!-- Blog Area Start -->
<div class="blog-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="section-title text-center">
                    <h2><span>Latest</span> Blog</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <!-- single-blog Start -->
                <div class="single-blog mt-30">
                    <div class="blog-image">
                        <a href="#"><img src="<?php echo base_url('assets/images/blog/blog-03.jpg');?>" alt=""></a>
                        <div class="meta-tag">
                            <p><span>21</span> / Nov</p>
                        </div>
                    </div>

                    <div class="blog-content">
                        <h4><a href="#">Lorem Ipsum available but majority</a></h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered in some ledmid form There are many majority have suffered </p>
                        <div class="read-more">
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <!-- single-blog End -->
            </div>
            <div class="col-lg-6 col-md-6">
                <!-- single-blog Start -->
                <div class="single-blog mt-30">
                    <div class="blog-image">
                        <a href="#"><img src="<?php echo base_url('assets/images/blog/blog-04.jpg');?>" alt=""></a>
                        <div class="meta-tag">
                            <p><span>26</span> / Nov</p>
                        </div>
                    </div>

                    <div class="blog-content">
                        <h4><a href="#">Available but majority lorem Ipsum </a></h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered in some ledmid form There are many majority have suffered </p>
                        <div class="read-more">
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <!-- single-blog End -->
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End -->

<script>
    $(document).ready(function () {
        $('.add-to-cart').click(function(){
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('front_office/cart/cart_add');?>",
                data: {product_id : id},
                success: function (response) {
                    var json = JSON.parse(response);
                    // console.log(json);
                    if(json.status == true){
                        toastr.success(json.message);
                        location.reload();
                    }else if(json.status == 'warning'){
                        toastr.warning(json.message);
                    }else{
                        toastr.error(json.message);
                    }
                    
                }
            });
            
        });

        $('.wishlist').click(function(){
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('front_office/Wishlist/action_add');?>",
                data: {product_id : id},
                success: function (response) {
                    location.reload();
                }
            });
            
        });

    });
</script>