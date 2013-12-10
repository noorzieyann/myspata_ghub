        <div id="successLogin"></div>
        <div class="text_success"><img src="<?php echo base_url(); ?>asset/images/loader_green.gif"  alt="ziceAdmin" /><span>Please wait</span></div>
        <?php echo validation_errors('<p id="error_view">'); ?>
        <div id="login" >
            <div class="ribbon"></div>
            <div class="inner clearfix">
                <div class="logo" ><img src="<?php echo base_url(); ?>asset/images/logo_login.png" alt="ziceAdmin" /></div>
                <div class="formLogin">
                    <span style="color:#F00"><?php echo form_open('auth/login_validation'); ?></span>
                        <div class="tip">
                            <input name="userName" type="text"  id="username_id"  title="Username" />
                        </div>
                        <div class="tip">
                            <input name="userPassword" type="password" id="password" title="Password" />
                        </div>
                        <div class="loginButton">
                            <div style="float:left; margin-left:-9px;">
                                <input type="checkbox" id="on_off" name="remember" class="on_off_checkbox"  value="1" />
                                <span class="f_help">Remember me</span>
                            </div>
                            <div class=" pull-right" style="margin-right:-8px;">
                                <div class="btn-group">
                                    <button class="btn btn-group">Login</button>
                                    <button class="btn"> Forget Pass</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="shadow"></div>
        </div>
