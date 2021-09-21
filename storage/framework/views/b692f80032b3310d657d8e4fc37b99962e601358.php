
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Sites::inc.maketting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="main">
    <div class="intro">
        <p style="font-size: 18px;">Start your first course</p>
        <p style="font-size: 18px;">Choose a course to get started</p>
        <p style="font-size: 24px;">NEW COURSE FROM PROS</p>
    </div>
    <div class="classify">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sort">
                        <p style="color: white;">Sorted by:</p>
                        <button>Most Popular</button>
                        <button>Just Added</button>
                    </div>
                </div>
                <div class="col-md"></div>
            </div>
        </div>
    </div>
    <div class="teacher">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="img">
                        <img src="/public/upload/images/teachers/thumb/teacher<?php echo e($value->photo); ?>" alt="">
                        <div class="text-center">
                            <div class="cenn">
                                <div class="text"><span class="a"><?php echo e($value->fullname); ?></span>
                                </div>
                                <div class="button">
                                    <button><a href="All Class.html"><p><i class="bi bi-play-fill"></i>View all classes</p></a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="pagination">
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <p style="color: white; margin-bottom: 0px; padding-top: 10px;">...</p>
                <a href="#">5</a>
                <a href="#">6</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::allTeacher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/all_teacher/index.blade.php ENDPATH**/ ?>