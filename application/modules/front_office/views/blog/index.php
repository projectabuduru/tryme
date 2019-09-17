 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="breadcrumb-title">Blog Left Sidebar</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Blog left sidebar</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- shop-sidebar-wrap start -->
                        <div class="shop-sidebar-wrap">

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar mt-30 mb-30">
                                <h4 class="title">CATEGORIES</h4>
                                <ul>
                                    <li><a href="shop.html">brothers <span>(18)</span></a></li>
                                    <li><a href="shop.html">hatil <span>(16)</span></a></li>
                                    <li><a href="shop.html">Men <span>(6)</span></a></li>
                                    <li><a href="shop.html">Women <span>(11)</span></a></li>
                                </ul>
                            </div>
                            <!-- shop-sidebar end -->


                            <!-- shop-sidebar start -->
                            <div class="sidbar-product shop-sidebar mb-30">
                                <h4 class="title">LATEST BLOG</h4>
                                <ul class="footer-blog">
                                    <li>
                                        <div class="widget-blog-wrap">
                                            <div class="widget-blog-image">
                                                <a href="#"><img src="<?php echo base_url('assets/images/blog/small-blog.jpg');?>" alt=""></a>
                                            </div>
                                            <div class="widget-blog-content">
                                                <h6><a href="#">Some patience for the modern market</a></h6>
                                                <div class="widget-blog-meta">
                                                    <span>21 Aug 2019</span> <span>By <a href="#">Admin</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-blog-wrap">
                                            <div class="widget-blog-image">
                                                <a href="#"><img src="<?php echo base_url('assets/images/blog/small-blog-02');?>.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-blog-content">
                                                <h6><a href="#">Modern market Some patience for the </a></h6>
                                                <div class="widget-blog-meta">
                                                    <span>13 Aug 2019</span> <span>By <a href="#">Admin</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-blog-wrap">
                                            <div class="widget-blog-image">
                                                <a href="#"><img src="<?php echo base_url('assets/images/blog/small-blog.jpg');?>" alt=""></a>
                                            </div>
                                            <div class="widget-blog-content">
                                                <h6><a href="#">Lorem ipsum dolor sit amet. </a></h6>
                                                <div class="widget-blog-meta">
                                                    <span>13 Aug 2019</span> <span>By <a href="#">Admin</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- shop-sidebar end -->


                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar mb-30">
                                <h4 class="title">SIZE</h4>
                                <ul>
                                    <li><a href="shop.html">S <span>(11)</span></a></li>
                                    <li><a href="shop.html">M <span>(13)</span></a></li>
                                    <li><a href="shop.html">L <span>(6)</span></a></li>
                                    <li><a href="shop.html">XLL <span>(51)</span></a></li>
                                    <li><a href="shop.html">XXL <span>(3)</span></a></li>
                                </ul>
                            </div>
                            <!-- shop-sidebar end -->

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar">
                                <h4 class="title">Hot Tags</h4>
                                <div class="sidebar-tag">
                                    <a href="#">Red</a>
                                    <a href="#">Blue</a>
                                    <a href="#">Man</a>
                                    <a href="#">White</a>
                                    <a href="#">Yellow</a>
                                    <a href="#">Digital</a>
                                    <a href="#">Women</a>
                                    <a href="#">Evergreen</a>
                                </div>
                            </div>
                            <!-- shop-sidebar end -->
                        </div>
                        <!-- shop-sidebar-wrap end -->
                    </div>
                    <div class="col-lg-9 order-lg-2 order-1">
                        <!-- shop-product-wrapper start -->
                        <div class="blog-product-wrapper">

                            <div class="row">
                                <?php
                                    foreach ($data as $key => $value) {
                                        echo '<div class="col-lg-6 col-md-6">
                                                <!-- single-blog Start -->
                                                <div class="single-blog mt-30">
                                                    <div class="blog-image">
                                                        <a href="#"><img src="'.base_url('assets/images/blog/blog-06.jpg').'" alt=""></a>
                                                        <div class="meta-tag">
                                                            <p><span>'.$value->tgl.'</span> / '.$value->bulan.'</p>
                                                        </div>
                                                    </div>
            
                                                    <div class="blog-content">
                                                        <h4><a href="'.base_url('blog/detail/'.$value->blog_slug).'">'.$value->blog_title.'</a></h4>
                                                        <p>'.substrwords($value->blog_content,150).'</p>
                                                        <div class="read-more">
                                                            <a href="'.base_url('blog/detail/'.$value->blog_slug).'">READ MORE</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-blog End -->
                                            </div>';
                                    }
                                ?>
                            </div>

                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul class="pagination-box">
                                            <?php echo $pagination;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                        <!-- shop-product-wrapper end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->