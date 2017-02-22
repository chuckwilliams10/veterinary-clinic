<div class="container">
    <br>
    <div class="section">
        <div id="login-page" class="row">
            <div class="col s6 z-depth-4 card-panel  offset-s3">
                <form class="login-form" method="post">
                    <div class="row">
                        <div class="input-field col s12 center">
                            <img src="<?php echo res_url("site/images/logos.png"); ?>" alt="" class="circle responsive-img valign profile-image-login">
                            <p class="center login-form-text"></p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="col s12">
                            <input id="username" type="text" name="acc_username" placeholder="email@domain.com">
                            <label for="username" class="center-align">Username</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="col s12">
                            <input id="password" type="password" name="acc_password" placeholder="password" minlength="6">
                            <label for="password">Password</label>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="input-field col s12"> 
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                Send <i class="mdi-content-send right"></i>
                            </button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>