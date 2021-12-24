
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
                            <p><?php echo e(substr(Auth::user()->fullname,  0, 1)); ?></p>
                        </div>
                    </div>
                    <p><?php echo e(Auth::user()->fullname); ?></p>
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
                    <?php $__currentLoopData = $list_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/course/<?php echo e($value->id . '-' . Str::slug($value->name)); ?>"><div class="items">
                        <img src="/public/upload/images/teachers/thumb/teacher<?php echo e($value->photo); ?>" alt="">
                        <div class="lname">
                            <p><?php echo e($value->name); ?></p>
                            <p id="lname"><?php echo e($value->fullname); ?></p>
                        </div>
                    </div></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/my_course/index.blade.php ENDPATH**/ ?>