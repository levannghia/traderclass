<?php
use App\Modules\Sites\Models\Config_Model;
use App\Modules\Sites\Models\Contact_Model;

    $config_link_youtube = Config_Model::find(6);
    $config_link_facebook = Config_Model::find(7);
    $config_link_instagram = Config_Model::find(8);
    $config_chplay_link = Config_Model::find(37);
    $config_apple_store_link = Config_Model::find(38);
    $contact = Contact_Model::find(4);
    

?>
<div class="footer">
    <div class="text-lg-start text-muted">
        <section class="" style="
        padding-top: 5px;
        background-color: #111319;">
            <div class="container text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 ">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <?php echo e($contact->name); ?>

                        </h6>
                        <p>
                            <?php echo e($contact->enterprise_code); ?>

                        </p>
                        <p><?php echo e($contact->founding_date); ?></p>
                        <p><?php echo e($contact->message); ?></p>
                        <p><img src="/public/sites/svg/icondangki.svg" alt=""></p>
                    </div>
                    <div class="col-md-4 mx-auto">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <p style="
                            opacity: 0;
                        "> padding</p>
                        </h6>
                        <p>
                            <i class="bi bi-geo-alt-fill"></i> <?php echo e($contact->address); ?>

                        </p>
                        <p>
                            <i class="bi bi-telephone-fill"></i> <?php echo e($contact->phone); ?>

                        </p>
                        <p>
                            <i class="bi bi-envelope-fill"></i> <?php echo e($contact->email); ?>

                        </p>
                        <div class="IconConnec">
                            <li><a href="<?php echo e($config_link_facebook->value); ?>"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="<?php echo e($config_link_instagram->value); ?>"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="<?php echo e($config_link_youtube->value); ?>"><i class="bi bi-youtube"></i></a></li>
                        </div>
                    </div>
                    <div class="col-md-2 mx-auto">
                        <h6 class="text-uppercase fw-bold mb-4">
                            About
                        </h6>
                        <p>
                            <a href="/" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="/all-class" class="text-reset">All Classes</a>
                        </p>
                        <p>
                            <a href="/contact" class="text-reset">Contact</a>
                        </p>
                        <p>
                            <a href="/policy/privacy-policy.html" class="text-reset">Privacy</a>
                        </p>
                        <p>
                            <a href="/policy/terms-of-service.html" class="text-reset">Terms</a>
                        </p>
                        <p>
                            <a href="/policy/return-and-refund-policy.html" class="text-reset">Return & Refund Policy</a>
                        </p>
                    </div>
                    <div class="col-md-3 ">

                        <h6 class="text-uppercase fw-bold mb-4">
                            Download
                        </h6>
                        <a class="app-btn blu flex vert" href="<?php echo e($config_apple_store_link->value); ?>">
                            <i class="fab fa-apple" style="
                            margin-left: -20px;
                        "></i>
                            <p>Available on the <br/> <span class="big-txt">App Store</span></p>
                        </a>

                        <a class="app-btn blu flex vert" href="<?php echo e($config_chplay_link->value); ?>">
                            <i style="
                            margin-bottom: 3px;
                        "><img src="/public/sites/images/CHPlay.png" alt=""></i>
                            <p>Get it on <br/> <span class="big-txt">Google Play</span></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container" style="padding-bottom: 50px;">
                <div class="row">
                    <div class="col-md-6">
                        <button class="lang"><i class="bi bi-globe" style="margin-left: -10px;margin-right: 10px;"></i> ENGLISH <i class="bi bi-chevron-down" style="margin-left: 10px;margin-right: -10px;"></i></button>
                    </div>
                </div>
                <p class="trader"> © 2021 TraderClass</p>
            </div>
        </section>
    </div>
</div><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/inc/footer.blade.php ENDPATH**/ ?>