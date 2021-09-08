
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Sites::inc.maketting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="main">
    <div class="container">
        <p id="title">My Course</p>
        <div class="row">
            <div class="col-md-3">
                <div class="avta">
                    <div class="avt">
                        <div class="ava">
                            <p>M</p>
                        </div>
                    </div>
                    <p>Pham Ngoc Minh</p>
                </div>
                <div class="profile">
                    <p style="    font-weight: 500;">PROFILE</p>
                    <a href="account.html">
                        <p><i class="bi bi-person-fill"></i>&nbsp; Profile</p>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="list">
                    <div class="items">
                        <img src="/public/sites/images/a8a27a3e091785de49b2b08bd9a9a6e9.jpg" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/801fa697751643ce650fcdb3b7e7a86e.jpg" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/81dc103a38ef37182a733720fa218003.jpg" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/Annie Leibovitz.png" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/Alicia Keys.png" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/issa-rae.png" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/my_course/index.blade.php ENDPATH**/ ?>