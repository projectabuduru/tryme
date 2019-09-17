 <style>
 .child{
    padding-left: 120px;
 }
 </style>
 <!-- breadcrumb-area start -->
<div class="breadcrumb-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="breadcrumb-title">Blog Details</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                    <li class="breadcrumb-item active">Blog Details</li>
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
                                                <a href="#"><img src="<?php echo base_url('assets/images/blog/small-blog.jpg"');?> alt=""></a>
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
                                                <a href="#"><img src="<?php echo base_url('assets/images/blog/small-blog-02.jpg');?>" alt=""></a>
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
                                                <a href="#"><img src="<?php echo base_url('assets/images/blog/small-blog.jpg"');?> alt=""></a>
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
                    <div class="col-lg-7 order-lg-2 oreder-2 offset-lg-1">

                        <div class="row">

                            <div class="col-lg-12 blog-details-area">
                                <div class="blog-details-image mt-30">
                                    <img src="assets/images/blog/blog-details-01.jpg" alt="">
                                </div>
                                <div class="our-blog-contnet">
                                    <h5><a href="blog-details.html"><?php echo $data->blog_title;?></a></h5>
                                    <div class="post_meta">
                                        <ul>
                                            <li>
                                                <p>By: <a href="#">Rehan Khan</a></p>
                                            </li>
                                            <li>
                                                <p><?php echo $data->tanggal;?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <p> <?php echo $data->blog_content;?></p>
                                </div>

                            </div>

                            <!-- <div class="col-lg-12">
                                <div class="admin-author-details">
                                    <div class="admin-aouthor">
                                        <div class="admin-image">
                                            <img src="assets/images/other/author.png" alt="">
                                        </div>
                                        <div class="admin-info">
                                            <div class="name">
                                                <h5>Sophia Lourance</h5>
                                                <p>Author</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut laboreUt enim.</p>
                                            <ul class="author-socialicons">
                                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                                <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- blog-details-wrapper -->
                            <div class="col-lg-12 review_address_inner mt-60">
                                <h5>Comments</h5>
                                <!-- Single Review -->
                                <div class="pro_review">
                                    <div class="review_thumb">
                                        <img alt="review images" src="<?php echo base_url('assets/images/other/review-01.jpg');?>">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h5><a href="#">Helen Nancy</a></h5>
                                            <div class="rating_send">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>30 May, 2019</span> <span>10:20 pm</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod teimpor in aliqua. Utf enim ad minim veniam,</p>
                                    </div>
                                </div>
                                <!--// Single Review -->
                                
                                <!-- Single Review -->
                                <div class="pro_review child">
                                    <div class="review_thumb">
                                        <img alt="review images" src="<?php echo base_url('assets/images/other/review-02.jpg');?>">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h5><a href="#">tome Shetty</a></h5>
                                            <div class="rating_send">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>Sep 11, 2019</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit con dipis cing elitdpon aliqua minim veniam,</p>
                                    </div>
                                </div>
                                <!--// Single Review -->
                                <!-- Single Review -->
                                <div class="pro_review child">
                                    <div class="review_thumb">
                                        <img alt="review images" src="<?php echo base_url('assets/images/other/review-03.jpg');?>">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h5><a href="#">ketrin frans</a></h5>
                                            <div class="rating_send">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>Sep 25, 2019</span>
                                        </div>
                                        <p>dolore magna aliqua. Ut enim ad con Duis aute irur eritae pliciav aquuntu consectetur dunt ut labore et dolore magna aliqua. Ut enim adabz.</p>
                                    </div>
                                </div>
                                <!--// Single Review -->
                                <!-- Single Review -->
                                <div class="pro_review child">
                                    <div class="review_thumb">
                                        <img alt="review images" src="<?php echo base_url('assets/images/other/review-03.jpg');?>">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h5><a href="#">ketrin frans</a></h5>
                                            <div class="rating_send">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>Sep 25, 2019</span>
                                        </div>
                                        <p>dolore magna aliqua. Ut enim ad con Duis aute irur eritae pliciav aquuntu consectetur dunt ut labore et dolore magna aliqua. Ut enim adabz.</p>
                                    </div>
                                </div>
                                <!--// Single Review -->
                                <!-- Single Review -->
                                <div class="pro_review child">
                                    <div class="review_thumb">
                                        <img alt="review images" src="<?php echo base_url('assets/images/other/review-03.jpg');?>">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h5><a href="#">ketrin frans</a></h5>
                                            <div class="rating_send">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>Sep 25, 2019</span>
                                        </div>
                                        <p>dolore magna aliqua. Ut enim ad con Duis aute irur eritae pliciav aquuntu consectetur dunt ut labore et dolore magna aliqua. Ut enim adabz.</p>
                                    </div>
                                </div>
                                <!--// Single Review -->
                                <!-- Single Review -->
                                <div class="pro_review child">
                                    <div class="review_thumb">
                                        <img alt="review images" src="<?php echo base_url('assets/images/other/review-03.jpg');?>">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h5><a href="#">ketrin frans</a></h5>
                                            <div class="rating_send">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>Sep 25, 2019</span>
                                        </div>
                                        <p>dolore magna aliqua. Ut enim ad con Duis aute irur eritae pliciav aquuntu consectetur dunt ut labore et dolore magna aliqua. Ut enim adabz.</p>
                                    </div>
                                </div>
                                <!--// Single Review -->
                                
                            </div>
                            <div class="col-lg-12">
                                <div class="comments-reply-area">
                                    <h5 class="comment-reply-title mb-30">Leave a Reply</h5>
                                    <form action="#" class="comment-form-area">
                                        <div class="comment-input">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p class="comment-form">
                                                        <input type="text" required="required" name="Name" placeholder="Name *">
                                                    </p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p class="comment-form">
                                                        <input type="email" required="required" name="email" placeholder="Email *">
                                                    </p>
                                                </div>

                                                <div class="col-lg-12">
                                                    <p class="comment-form-comment">
                                                        <textarea class="comment-notes" required="required" placeholder="Comment *"></textarea>
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="comment-form-submit">
                                                        <button class="comment-submit">SUBMIT</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--// blog-details-wrapper -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->