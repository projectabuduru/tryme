<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb lagin-and-register-page">
    <div class="container">
        <div class="row" id="content">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <?php
                        if(!empty($user)){
                            if($user->role != 'partner'){
                    ?>
                            <!-- login-register-tab-list start -->
                            <div class="login-register-tab-list nav">
                                <a data-toggle="tab" href="#lg2">
                                    <h4> Upgrade your member </h4>
                                </a>
                            </div>
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">                        
                                <div id="lg2" class="tab-pane tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" class="frm-input-upgrade-sales" method="post" enctype="multipart/form-data">
                                                <div class="login-input-box">
                                                    <input type="text" name="user_nama" id="user_nama" required value="<?php echo $user->user_nama;?>" placeholder="User Nama">
                                                    <input name="user_email" placeholder="Email" id="user_email" required value="<?php echo $user->user_email;?>"  type="email">
                                                    <input name="user_telp" placeholder="Nomor Telpon" id="user_telp" value="<?php echo $user->user_telp;?>" required type="text">
                                                    <input type="password" name="user_password" id="password" required  placeholder="Password">
                                                </div>
                                                <div class="button-box">
                                                    <button class="register-btn btn buton-register" type="button"><span>Upgrade To Partner</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                            }
                        }else{
                    ?>
                     <!-- login-register-tab-list start -->
                     <div class="login-register-tab-list nav">
                        <a data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <!-- login-register-tab-list end -->
                    <div class="tab-content">                        
                        <div id="lg2" class="tab-pane tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" class="frm-input-register-sales" method="post" enctype="multipart/form-data">
                                        <div class="login-input-box">
                                            <input type="text" name="user_nama" id="user_nama" required  placeholder="User Nama">
                                            <input name="user_email" placeholder="Email" id="user_email" required  type="email">
                                            <input name="user_telp" placeholder="Nomor Telpon" id="user_telp" required type="text">
                                            <input type="password" name="user_password" id="password" required  placeholder="Password">
                                        </div>
                                        <div class="button-box">
                                            <button class="register-btn btn buton-register-sales" type="button"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                   

                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
<script>
    $(document).ready(function () {
        // $(".buton").click(function(){
            var urll_login = '<?php echo base_url('login/login');?>';
            var cls_login = '.frm-input-login';
            var buton_login = '.buton-upgrade';
            global.init_form_add(cls_login, buton_login, urll_login);

            var urll_register = '<?php echo base_url('partner/register');?>';
            var cls_register = '.frm-input-register-sales';
            var buton_register = '.buton-register-sales';
            global.init_form_add(cls_register, buton_register, urll_register);

        // });
    });
</script>