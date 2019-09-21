<div class="main-content-wrap section-ptb my-account-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="account-dashboard">
                    <div class="dashboard-upper-info">
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-3 col-md-12">
                                <div class="d-single-info">
                                    <p class="user-name">Hallo <span> <?php echo $user->user_nama;?></span></p>
                                    <p> (<?php echo $user->user_email;?>)</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="d-single-info">
                                    <p>Butuh Bantuan silah hubungi Customer Service</p>
                                    <p>ini diisi WA - ME</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="d-single-info">
                                    <p>E-mail them at </p>
                                    <p>support@yoursite.com</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <div class="d-single-info text-lg-center">
                                    <a href="cart.html" class="view-cart"><i class="fa fa-cart-plus"></i>view cart</a>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>

                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-2">
                            <!-- Nav tabs -->
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="<?php echo base_url('profile');?>">Dashboard</a></li>
                                <li><a href="<?php echo base_url('profile/riwayat/order');?>">Riwayat Pembelian</a></li>
                                <li><a href="<?php echo base_url('profile/alamat');?>">Alamat</a></li>
                                <li><a href="<?php echo base_url('profile/account');?>" >Account details</a></li>
                            </ul>
                        </div>
