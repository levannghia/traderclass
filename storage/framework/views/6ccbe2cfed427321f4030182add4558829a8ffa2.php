
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
    <form method="post" enctype="multipart/form-data">
        <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group mb-2">
                        <label for="title"><?php echo e($value->name); ?></label>
                        <input type="text" name="<?php echo e($value->name); ?>" value="<?php echo e(old($value->name, $value->value)); ?>"
                            class="form-control form-control-sm" placeholder="* <?php echo e($value->name); ?>">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> <?php echo e($image->name); ?></h5>
                    <?php if($image->value != ''): ?>
                        <div class="form-group mb-2">
                            <img src="/public/upload/images/sites_home/large/<?php echo e($image->value); ?>"
                                style="width: auto;max-width: 100%">
                        </div>
                    <?php endif; ?>
                    <div class="form-group mb-2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " name="<?php echo e($image->name); ?>" id="photo">
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Dashboard/Views/home/section3.blade.php ENDPATH**/ ?>