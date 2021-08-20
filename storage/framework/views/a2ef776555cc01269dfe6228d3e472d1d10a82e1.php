
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="intro">
        <p style="font-size: 18px;">Start your first course</p>
        <p style="font-size: 18px;">Choose a course to get started</p>
        <p style="font-size: 24px;">NEW COURSE FROM PROS</p>
    </div>
    <div class="teacher">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="img">
                        <img src="<?php echo e('./public/upload/images/teachers/thumb/'.'all_class'.$value->photo); ?>" alt="">
                        <div class="text-center">
                            <div class="font" style="color: white;"><span class="a"><?php echo e($value->fullname); ?></span> <br> <span class="b">-</span> <br><span class="c"><?php echo e($value->name); ?></span>
                            </div>
                            <div class="button">
                                <button><a href="<?php echo e(url('/teacher/'.$value->teacher_id)); ?>"><p><i class="bi bi-play-fill"></i>Watch now</p></a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::allClass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules\Sites\Views\all_class\index.blade.php ENDPATH**/ ?>