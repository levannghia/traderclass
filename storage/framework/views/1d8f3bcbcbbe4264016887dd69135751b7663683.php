
                <form id="social-login-form" action="" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
                  <?php echo e(csrf_field()); ?>

                  <input id="token" name="token" type="text">
                  <input id="tokenId" name="tokenId" type="text">
                  <input id="uid" name="uid" type="text">
                  <input id="displayName" name="displayName" type="text">
                  <input id="_email" name="_email" type="text">
                  <input id="photo" name="photo" type="text">
                </form>

<?php echo $__env->make('Sites::inc.loginGoogle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
<!-- -------------create account--------------- -->
<div class="create-account">
   
    <h1>Create Account</h1>
    <button class="btn-google"><a onclick="loginGoogle()">SIGN UP WITH GOOGLE</a></button>
    <button class="btn-facebook"><a onclick="loginFacebook()">SIGN UP WITH FACEBOOK</a></button>
    <div class="signup-or"><span style="font-size: 11px;">OR</span></div>
    <form action="<?php echo e(route('users.create_request')); ?>" method="post">
        <?php echo csrf_field(); ?>
    <label class="signup-label" style="display: flex;margin-left: 20px;margin-top: 20px;">Email</label>
    <input type="email" name="email" class="signup-input">
    <label class="signup-label" style="display: flex;margin-left: 20px;margin-top: 15px;">Password</label>
    <input type="password" name="password" class="signup-input">
    <div class="remember-box" style="display: flex;margin-left: 20px;margin-top: 10px;align-items: center;">
        <input type="checkbox">
        <span class="checkmark"></span>
        <p style="font-size: 14px;text-align: left;width: 100%;">Keep me up to date on class events and new releases.</p>
    </div>
    <button class="btn-create">CREATE ACCOUNT</button>
    <div class="sign-in">
        <p>Already have an account? <a onclick="sign_in()" style="color: #000000;cursor: pointer;">Sign in.</a></p>
    </div>
    <div class="text" style="margin-top: 20px!important;">
        <p>By logging in, you agree to our <br>
            <a href="" style="color: #A7A9AC;">Privacy Policy</a> and
            <a href="" style="color: #A7A9AC;">Terms of Service</a>.
        </p>
    </div>
    </form>
</div>
<!-- -----------------log-in-------------------- -->
<div class="log-in">
   
        <h1>Log In</h1>
    <button class="btn-google"><a onclick="loginGoogle()">SIGN UP WITH GOOGLE</a></button>
    <button class="btn-facebook"><a onclick="loginFacebook()">SIGN UP WITH FACEBOOK</a></button>
    <div class="signup-or"><span style="font-size: 11px;">OR</span></div>
    <form action="<?php echo e(route('users.login_request')); ?>" method="post">
        <?php echo csrf_field(); ?>
    <label class="signup-label" style="display: flex;margin-left: 20px;margin-top: 20px;">Email</label>
    <input type="email" name="email" class="signup-input">
    <label class="signup-label" style="display: flex;margin-left: 20px;margin-top: 15px;">Password</label>
    <input type="password" name="password" class="signup-input">
    <button class="btn-create" type="submit" style="margin-top: 30px;">LOG IN</button>
    <div class="sign-in">
        <p>Need an account? <a onclick="toggle()" style="color: #000000;cursor: pointer;">Sign up.</a></p>
    </div>
    <div class="text" style="margin-top: 30px!important;">
        <a onclick="reset_password()" style="cursor: pointer;">
            <p style="color: #A7A9AC;">Forgot your password?</p>
        </a>
    </div>
    <div class="text" style="margin-top: 30px!important;">
        <p>By logging in, you agree to our <br>
            <a href="" style="color: #A7A9AC;">Privacy Policy</a> and
            <a href="" style="color: #A7A9AC;">Terms of Service</a>.</p>
    </div>
    </form>
</div>
<!-- ------------login with google---------------- -->
<div class="login-with-google">
    <form>
        <p class="sign-in">Sign in with Google</p>
        <span></span>
        <p class="choose">Choose an account</p>
        <p class="continue" style="position: absolute;top: 199px;left: 232px;font-size: 24px;font-weight: 300;">to continue to</p>
        <p class="link" style="position: absolute;top: 227px;left: 230px;font-size: 24px;font-weight: 500;color:#06B1E8;">
            traderclass.vn</p>
        <div class="user">
            <!-- ---------1------------- -->
            <i class="fas fa-user-circle" style="position: absolute;top: 313px;left: 60px;font-size: 40px;"></i>
            <p style="position: absolute;top: 306px;left: 117px;font-size: 18px;">abc</p>
            <p style="position: absolute;top: 333px;left: 117px;font-size: 18px;font-size: 14px;">abc@gmail.com</p>
            <span style="position: absolute;top: 376px;left: 60px;border: 1px solid #C5C0C0;width: 504px;"></span>
            <!-- ---------2------------- -->
            <i class="fas fa-user-circle" style="position: absolute;top: 395px;left: 60px;font-size: 40px;"></i>
            <p style="position: absolute;top: 388px;left: 117px;font-size: 18px;">abc</p>
            <p style="position: absolute;top: 415px;left: 117px;font-size: 18px;font-size: 14px;">abc@gmail.com</p>
            <span style="position: absolute;top: 458px;left: 60px;border: 1px solid #C5C0C0;width: 504px;"></span>
            <!-- ---------3------------- -->
            <i class="fas fa-user-circle" style="position: absolute;top: 477px;left: 60px;font-size: 40px;"></i>
            <p class="use" style="position: absolute;top: 488px;left: 117px;font-size: 14px;font-weight: 300;">Use another account</p>
            <span style="position: absolute;top: 540px;left: 60px;border: 1px solid #C5C0C0;width: 504px;"></span>
        </div>
        <p class="text" style="position: absolute;top: 579px;left: 47px;width: 480px;color: #929191;font-size: 18px;font-weight: 300;">
            To continue, Google will share your name, email address, language preferences, and profile picture with traderclass.vn
        </p>
    </form>
    <ul class="left">
        <p style="position: absolute;top: 862px;left: 41px;">English</p>
        <i class="fas fa-chevron-down" style="position: absolute;top: 870.59px;left: 115px;"></i>
    </ul>
    <ul class="right">
        <p style="position: absolute;top: 871px;left: 419px;">Help</p>
        <p style="position: absolute;top: 871px;left: 497px;">Privacy</p>
        <p class="terms" style="position: absolute;top: 871px;left: 603px;">Terms</p>
    </ul>
</div>
<!-- -------------login with facebook------------->
<div class="login-with-facebook">
    <form>
        <img src="./images/image 18.png" style="position: absolute;top: 29px;left: 252px;">
        <p class="title1" style="position: absolute;top: 141px;left: 109px;font-size: 24px;font-weight: 500;">TraderClass is requesting access to:</p>
        <p class="title" style="position: absolute;top: 187px;left: 154px;font-size: 14px;font-weight: 300;">your name and profile picture and email address.</p>
        <i class="fas fa-pencil-alt" style="position: absolute;top: 230.5px;left: 261.5px;color: #06B1E8;"></i>
        <p class="title" style="position: absolute;top: 224px;left: 287px;color: #06B1E8;font-size: 14px;">Edit Access</p>
        <p class="title" style="position: absolute;top: 261px;left: 178px;font-size: 12px;color: #5C5C5C;">This does not allow the app to post to Facebook.</p>
        <button class="btn-continued" style="position: absolute;top: 323px;left: 56px;"><a href="">Continued under the name Abc</a></button>
        <button class="btn-cancel" style="position: absolute;top: 375px;left: 56px;"><a href="">Cancel</a></button>
        <p class="warning" style="position: absolute;top: 451px;left: 73px;font-size: 18px;font-weight: 300px;color: #6C6C6C;width: 518px;height: 108px;text-align: center;">By continuing, TraderClass will receive ongoing access to the information you share. Also, Facebook will log when TraderClass accesses that information. <label class="text1">Learn more</label> about this sharing option and the settings you have.</p>
        <p class="policy" style="position: absolute;top: 606px;left: 152px;">TraderClass <label class="text1">Terms</label> and <label class="text1">Privacy Policy</label></p>
    </form>
</div>
<!-- -----------reset password----------------->
<div class="reset-password">
    <form action=" <?php echo e(route('users.forgot')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <h1>Reset Password</h1>
    <label class="signup-label" style="display: flex;margin-left: 20px;margin-top: 20px;">Email</label>
    <input type="email" name="email" class="signup-input">
    <button class="btn-create">SEND EMAIL</button>
    <div class="sign-in">
        <p>Remember your password? <a onclick="sign_in()" style="color: #000000;cursor: pointer;">Log In.</a></p>
    </div>
    </form>
</div>
</html>
<?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/inc/login.blade.php ENDPATH**/ ?>