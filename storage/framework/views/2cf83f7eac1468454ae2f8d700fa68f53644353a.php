
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Sites::inc.maketting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="mains">
    <div class="container">
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md-6">
                <div class="cen">
                    <img src="/public/sites/images/image.png" alt="" srcset="" width="50%">
                    <div class="mail">
                        <div class="fri">
                            <p>Invite your friends to join TraderClass.</p>
                        </div>

                        <p id="re">Refer your friends to successfully register an account on TraderClass to <br> receive many incentives. The more the offer, the bigger the offer.</p>
                        <p>
                            <form action="#" class="na">
                                <input class="inputs" type="email" name="email" id="email" placeholder="   Enter the recipient's email">
                                <button type="submit">Send Invitation</button>
                            </form>
                        </p>
                    </div>
                    <div class="link">
                        <div class="fri">
                            <p>Friend Referral Link</p>
                        </div>
                        <div class="lin">
                            <div class="static">
                                <input class="inputs" type="text" id="copyTarget" readonly="readonly" value="https://traderclass.vn"> <button id="copyButton"><i class="fas fa-copy">          Copy</i></button><br><br>
                            </div>
                            <p>
                                <a href="#"><img src="/public/sites/svg/icons8-facebook.svg" alt=""></a>
                            </p>
                            <p>
                                <a href="#"><img src="/public/sites/svg/messenger.svg" alt="" width="25px" height="25px"></a>
                            </p>
                            <p>
                                <a href="#"><img src="/public/sites/svg/zalo.svg" alt="" width="25px" height="25px"></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md"></div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/invite_friends/index.blade.php ENDPATH**/ ?>